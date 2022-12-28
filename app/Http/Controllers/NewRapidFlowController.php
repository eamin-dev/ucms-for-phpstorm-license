<?php

namespace App\Http\Controllers;

use App\Http\Resources\FlowResource;
use App\Models\CountryOffice;
use App\Models\Flow;
use App\Models\FlowQuestion;
use App\Models\FlowQuestionAnswer;
use App\Models\ThemeficArea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        if (!$flow->save())
            return response()->json(['message' => 'Rapid-Pro Flow Failed to Save!'], Response::HTTP_BAD_REQUEST);

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

        if (!$flow->save())
            return response()->json(['message' => 'Rapid Pro Flow Failed to Update!'], Response::HTTP_BAD_REQUEST);

        return response()->json(['message' => 'Rapid Pro Flow Updated Successfully!']);
    }

    public function getRapidFlowId(Flow $flow)
    {

        //dd('hi');
        //$flow->load(['flow']);
        return response()->json(['flow' => $flow]);
    }

    // public function getUpazilatById(Upazila $upazila)
    // {
    //     $upazila->load(['district']);
    //     $upazila->zoneName = optional($upazila->district->zone)->name;
    //     return response()->json(['upazila' => $upazila]);
    // }

    public function flowDeleteById(Request $request)
    {
        $flow = Flow::findOrFail($request->flowId);

        $question = FlowQuestion::where('flow_id', $flow->id)->first();
        if (!empty($question)) {
            return response()->json(['message' => 'This Area can not be delete,this Area attached with Flow'], Response::HTTP_BAD_REQUEST);
        }
        if (!$flow->delete())
            return response()->json(['message' => 'Rapid Pro Flow Failed to Delete!'], Response::HTTP_BAD_REQUEST);

        return response()->json(['message' => 'Rapid Pro Flow Deleted Successfully!']);
    }

    public function viewFlow($flow)
    {
        $flowData = Flow::where('id', $flow)->first();
        $allQuestions = FlowQuestion::where('flow_id', $flow)->get();

        return view('rapidflow.question.index', compact('flowData', 'allQuestions'));
    }

    public function storeQuestion(Request $request)
    {

        //return $request->toArray();

        DB::beginTransaction();

        try {

            $flowQuestion = new FlowQuestion();
            $flowQuestion->uuid = Str::uuid();
            $flowQuestion->flow_id = $request->flow_id;
            $flowQuestion->question_title = $request->question_title;
            $flowQuestion->ans_Type = $request->ans_type;
            $flowQuestion->input_answer = $request->input_answer;
            $flowQuestion->save();

            if ($request->ans_type == "multiple_Choice") {

                $length = count($request->answer);
                //return $length;

                for ($i = 0; $i < $length; $i++) {

                    $ans = new FlowQuestionAnswer();
                    $ans->flow_question_id = $flowQuestion->id;
                    $ans->answer = $request->answer[$i];
                    $ans->save();
                }
            }


            DB::commit();

            return redirect()->back();


        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    public function exportJson($rapidId)
    {
        $flows = Flow::with('questions.answers')->where('id', $rapidId)->get();

//        return \response()->download()
        return response()->json([
            'version' => 13,
            'site' => config('app.url'),
            'flows' => FlowResource::collection($flows),
            'campaigns' => [],
            'triggers' => [],
            'fields' => [],
            'groups' => [],
        ]);

    }
}
