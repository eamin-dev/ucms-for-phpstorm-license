<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\ThemeficArea;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class NewThemeficController extends Controller
{
    public function view(Request $request){
        if (!$request->ajax()) {
            return view('rapidPro.themefic-area.area');
        }
        $data = ThemeficArea::query();
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('actionBtn','rapidPro.themefic-area.actionBtn')
            ->rawColumns(['actionBtn'])
            ->toJson();
    }

    public function store(Request $request)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages('add',null);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $area = new ThemeficArea();
        $area->name = $request->name;
        if (!$area->save())
            return  response()->json(['message' => 'Themefic-Area Failed to Save!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Themefic-Area Saved Successfully!']);
    }

    private function validationRulesAndMessages($type,$id)
    {

        if ($type === 'add') {
            $rules = [
                'name' => ['required', Rule::unique('themefic_areas')],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => 'The Name has already been taken.',
            ];
        }

        if (!is_null($id)) {

            $rules = [
                'name' => ['required', Rule::unique('themefic_areas')->ignore($id)],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => 'The Name(En) has already been taken.',
            ];
        }

        return [$rules, $customMessages];
    }

    public function update(Request $request, ThemeficArea $area)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null,$area->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $area->name = $request->name;

        if (!$area->save())
            return  response()->json(['message' => 'Themefic Area Failed to Update!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Themefic Area Updated Successfully!']);
    }

    public function getAreaById(ThemeficArea $area)
    {
        return response()->json(['area' => $area]);
    }

    public function areaDeleteById(Request $request)
    {
       $area = ThemeficArea::findOrFail($request->areaId);

       $flow = Flow::where('themefic_area_id',$area->id)->first();
       if (!empty($flow)){
           return  response()->json(['message' => 'This Area can not be delete,this Area attached with Flow'], Response::HTTP_BAD_REQUEST);
       }
       if (!$area->delete())
            return  response()->json(['message' => 'ThemeficArea Failed to Delete!'], Response::HTTP_BAD_REQUEST);

       return  response()->json(['message' => 'ThemeficArea Deleted Successfully!']);
    }
}
