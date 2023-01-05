<?php

namespace App\Http\Controllers;

use App\Models\Flow;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RegionController extends Controller
{
    public function view(Request $request){
        if (!$request->ajax()) {
            return view('rapidPro.region.index');
        }
        $data = Region::query()->with('creator');
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('actionBtn','rapidPro.region.actionBtn')
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

        $region = new Region();
        $region->name = $request->name;
        $region->created_by = Auth::user()->id;
        if (!$region->save())
            return  response()->json(['message' => 'Themefic-Area Failed to Save!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Themefic-Area Saved Successfully!']);
    }

    private function validationRulesAndMessages($type,$id)
    {

        if ($type === 'add') {
            $rules = [
                'name' => ['required', Rule::unique('regions')],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => ' Name has already been taken.',
            ];
        }

        if (!is_null($id)) {

            $rules = [
                'name' => ['required', Rule::unique('regions')->ignore($id)],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => 'The Name(En) has already been taken.',
            ];
        }

        return [$rules, $customMessages];
    }

    public function update(Request $request, Region $region)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null,$region->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $region->name = $request->name;
        $region->updated_by = Auth::user()->id;

        if (!$region->save())
            return  response()->json(['message' => 'Region Failed to Update!'], Response::HTTP_BAD_REQUEST);

        return  response()->json(['message' => 'Region Updated Successfully!']);
    }

    public function getregionById(Region $region)
    {
        return response()->json(['region' => $region]);
    }

    public function regiondeleteById(Request $request)
    {
       $region = Region::findOrFail($request->areaId);

       //$flow = Flow::where('region_id',$region->id)->first();
       if (!empty($flow)){
           return  response()->json(['message' => 'This Area can not be delete,this Area attached with Flow'], Response::HTTP_BAD_REQUEST);
       }
       if (!$region->delete())
            return  response()->json(['message' => 'Region Failed to Delete!'], Response::HTTP_BAD_REQUEST);

       return  response()->json(['message' => 'Region Deleted Successfully!']);
    }
}
