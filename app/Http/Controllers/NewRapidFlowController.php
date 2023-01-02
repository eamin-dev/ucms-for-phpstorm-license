<?php

namespace App\Http\Controllers;

use App\Models\CountryOffice;
use App\Models\Flow;
use App\Models\FlowQuestion;
use App\Models\FlowQuestionAnswer;
use App\Models\ThemeficArea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class NewRapidFlowController extends Controller
{
    public function view(Request $request)
    {
        if (!$request->ajax()) {
            $countryOffices = CountryOffice::select('id', 'name')->get();
            $themeficAreas = ThemeficArea::select('id', 'name')->get();
            return view('rapidflow.flow', compact('countryOffices', 'themeficAreas'));
        }
        $data = Flow::latest();
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('actionBtn', 'rapidflow.actionBtn')
            ->rawColumns(['actionBtn'])
            ->toJson();
    }

    public function store(Request $request)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages('add', null);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $flow = new Flow();
        $flow->country_office_id = $request->country_office_id;
        $flow->date = $request->date;
        $flow->file_id = $request->file_id;
        $flow->themefic_area_id = $request->themefic_area_id;
        $flow->uuid = Str::uuid();
        if (!$flow->save()) {
            return response()->json(['message' => 'Rapid-Pro Flow Failed to Save!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Rapid-Pro Flow Saved Successfully!']);
    }

    private function validationRulesAndMessages($type, $id)
    {
        if ($type === 'add') {
            $rules = [
                'country_office_id' => 'required',
                'date' => 'required',
                'themefic_area_id' => 'required',
                'file_id' => ['required', Rule::unique('flows')],
            ];

            $customMessages = [
                'country_office_id.required' => 'Country office Field is required.',
                'date.required' => 'Date  Field is required.',
                'themefic_area_id.required' => 'Themefic Area is required.',
                'file_id.required' => 'File Id is required.',
                'file_id.unique' => 'File Id has already been taken.',
            ];
        }

        if (!is_null($id)) {

            $rules = [
                'country_office_id' => 'required',
                'date' => 'required',
                'themefic_area_id' => 'required',
                'file_id' => ['required', Rule::unique('flows')->ignore($id)],
            ];

            $customMessages = [
                'country_office_id.required' => 'Country office Field is required.',
                'date.required' => 'Date  Field is required.',
                'themefic_area_id.required' => 'Themefic Area is required.',
                'file_id.required' => 'File Id is required.',
                'file_id.unique' => 'File Id has already been taken.',
            ];
        }

        return [$rules, $customMessages];
    }

    public function update(Request $request, Flow $flow)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null, $flow->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $flow->country_office_id = $request->country_office_id;
        $flow->date = $request->date;
        $flow->file_id = $request->file_id;
        $flow->themefic_area_id = $request->themefic_area_id;

        if (!$flow->save()) {
            return response()->json(['message' => 'Rapid Pro Flow Failed to Update!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Rapid Pro Flow Updated Successfully!']);
    }

    public function getRapidFlowId(Flow $flow)
    {

        return response()->json(['flow' => $flow]);
    }

    public function flowDeleteById(Request $request)
    {
        $flow = Flow::findOrFail($request->flowId);

        $question = FlowQuestion::where('flow_id', $flow->id)->first();
        if (!empty($question)) {
            return response()->json(['message' => 'This Area can not be delete,this Area attached with Flow'], Response::HTTP_BAD_REQUEST);
        }
        if (!$flow->delete()) {
            return response()->json(['message' => 'Rapid Pro Flow Failed to Delete!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Rapid Pro Flow Deleted Successfully!']);
    }

    public function viewFlow($flow)
    {
        $flowData = Flow::with('questions.answers')->findOrFail($flow);
        return view('rapidflow.question.index', compact('flowData'));
    }

    public function storeQuestion(Request $request)
    {
        DB::beginTransaction();

        try {

            $flowQuestion = new FlowQuestion();
            // $flowQuestion->uuid = Str::uuid();
            $flowQuestion->flow_id = $request->flow_id;
            $flowQuestion->question_title = $request->question_title;
            $flowQuestion->ans_Type = $request->ans_type;
            $flowQuestion->input_answer = $request->input_answer;
            $flowQuestion->save();

            if ($request->ans_type == 'multiple_Choice') {

                //$length = count($request->answer);
                for ($i = 0; $i < count($request->answer); $i++) {

                    $ans = new FlowQuestionAnswer();
                    $ans->flow_question_id = $flowQuestion->id;
                    // $ans->uuid = Str::uuid();
                    $ans->answer = $request->answer[$i];
                    $ans->save();
                }

            }

            DB::commit();

            $notification = array(
                'message' => 'Question  Successfully Added',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function exportDatatJson(Request $request, $id)
    {

        $questionJson = FlowQuestion::with('questionanswer')->where('flow_id', $id)->get();

        // return $questionJson;

        $jsonData = json_encode($questionJson);

        $fileName = time() . '_datafile.json';
        $fileStorePath = public_path('/upload/json/' . $fileName);
        File::put($fileStorePath, $jsonData);
        return response()->download($fileStorePath);

    }

    public function exportJson($rapidId)
    {
        $flows = Flow::with('questions.answers')->where('id', $rapidId)->get();

        $flowArray = [];

        /* flow loop start */
        foreach ($flows as $flow) {
            $nodeUUIDCount = $flow->questions->count();
            $nodeUUIDlist = [];
            for ($i =0; $i< $nodeUUIDCount; $i++){
                $nodeUUIDlist[] = Str::uuid();
            }

            $flowArray2 = [];
            $flowArray2['name'] = $flow->file_id;
            // $flowArray2['uuid'] = $flow->uuid;
            $flowArray2['uuid'] = Str::uuid();
            $flowArray2['spec_version'] = '13.1.0';
            $flowArray2['language'] = 'eng';
            $flowArray2['type'] = 'messaging';
            $flowArray2['nodes'] = [];

            /* nodes loop start */
            $allNodeArray = [];
            foreach ($flow->questions as $index => $node) {
                $routerNodeUUID = Str::uuid();
                $default_category_uuid = Str::uuid();
                $routerNodeArrayExitUUID = Str::uuid();

                //database node loop start
                $nodeArray = [];
                $nodeArray['uuid'] = $nodeUUIDlist[$index];

                $nodeArray['actions'] = [[
                    'uuid' => Str::uuid(),
                    'quick_replies' => $node->answers->pluck('answer'),
                    'text' => $node->question_title,
                    'type' => 'send_msg',
                ]];

                $nodeArray['exits'] = [[
                    'uuid' => Str::uuid(),
                    'destination_uuid' => $routerNodeUUID,
                ]];
                //database node loop end

                //router node loop start
                $routerNodeArray = [];
                $routerNodeArray['uuid'] = $routerNodeUUID;
                $routerNodeArray['actions'] = [];

                $routerNodeArrayCategories = [
                    "exit_uuid" => $routerNodeArrayExitUUID,
                    "name" => "All Responses",
                    "uuid" => $default_category_uuid,
                ];
                $routerNodeArray['router'] = [
                    "default_category_uuid" => $default_category_uuid,
                    "cases" => [],
                    "categories" => [$routerNodeArrayCategories],
                    "operand" => "@input.text",
                    "result_name" => "result_$index",
                    "type" => "switch",
                    "wait" => ['type' => 'msg'],
                ];
                $routerNodeArray['exits'] = [[
                    'uuid' => $routerNodeArrayExitUUID,
                    'destination_uuid' => $nodeUUIDlist[$index + 1] ?? null,
                ]];
                array_push($allNodeArray, $nodeArray);
                array_push($allNodeArray, $routerNodeArray);

                //router node loop end
            }
            $flowArray2['nodes'] = $allNodeArray;
            /* nodes loop end */

            array_push($flowArray, $flowArray2);
        }
        /* flows loop end */

        $jsonData = json_encode([
            'version' => 13,
            'flows' => $flowArray,
        ]);

        $fileName = time() . '_datafile.json';
        $fileStorePath = public_path('/upload/json/' . $fileName);
        File::put($fileStorePath, $jsonData);
        return response()->download($fileStorePath);
    }

    public function questionDelete($id)
    {
        $question = FlowQuestion::findOrFail($id);

        $question->delete();
        return back();
//        return response()->json(['message' => 'Rapid Pro Flow Deleted Successfully!']);
    }
}
