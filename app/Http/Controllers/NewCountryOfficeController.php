<?php

namespace App\Http\Controllers;

use App\Models\CountryOffice;
use App\Models\Flow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class NewCountryOfficeController extends Controller
{
    public function view(Request $request){
        if (!$request->ajax()) {
            return view('rapidPro.themefic-area.area');
        }
        $data = CountryOffice::query()->select('id','name');
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

        $area = new CountryOffice();
        $area->name = $request->name;
        if (!$area->save())
            return  response()->json(['message' => 'Themefic-Area Failed to Save!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Themefic-Area Saved Successfully!']);
    }

    private function validationRulesAndMessages($type,$id)
    {

        if ($type === 'add') {
            $rules = [
                'name' => ['required', Rule::unique('country_offices')],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => 'The Name has already been taken.',
            ];
        }

        if (!is_null($id)) {

            $rules = [
                'name' => ['required', Rule::unique('country_offices')->ignore($id)],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => 'The Name(En) has already been taken.',
            ];
        }

        return [$rules, $customMessages];
    }

    public function update(Request $request, CountryOffice $area)
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

    public function getAreaById(CountryOffice $area)
    {
        return response()->json(['area' => $area]);
    }

    public function areaDeleteById(Request $request)
    {
       $office = CountryOffice::findOrFail($request->areaId);

       $flow = Flow::where('themefic_area_id',$office->id)->first();
       if (!empty($flow)){
           return  response()->json(['message' => 'This office can not be delete,this Country Office attached with Flow'], Response::HTTP_BAD_REQUEST);
       }
       if (!$office->delete())
            return  response()->json(['message' => 'CountryOffice Failed to Delete!'], Response::HTTP_BAD_REQUEST);

       return  response()->json(['message' => 'CountryOffice Deleted Successfully!']);
    }
}
