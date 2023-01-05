<?php

namespace App\Http\Controllers;

use App\Models\CountryOffice;
use App\Models\Flow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class CountryOfficeController extends Controller
{

    public function view(Request $request)
    {
        if (!$request->ajax()) {
            return view('rapidPro.countryOffice.office');
        }
        $data = CountryOffice::query()->with('creator');
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('actionBtn', 'rapidPro.countryOffice.actionBtn')
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

        $region = new CountryOffice();
        $region->name = $request->name;
        $region->created_by = Auth::user()->id;
        if (!$region->save()) {
            return response()->json(['message' => 'Themefic-Area Failed to Save!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Themefic-Area Saved Successfully!']);
    }

    private function validationRulesAndMessages($type, $id)
    {

        if ($type === 'add') {
            $rules = [
                'name' => ['required', Rule::unique('country_offices')],
            ];

            $customMessages = [
                'name.required' => 'Name field is required.',
                'name.unique' => ' Name has already been taken.',
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

    public function update(Request $request, CountryOffice $office)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null, $office->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $office->name = $request->name;
        $office->updated_by = Auth::user()->id;

        if (!$office->save()) {
            return response()->json(['message' => 'Country Office Failed to Update!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Country Office Updated Successfully!']);
    }

    public function getOffice(CountryOffice $office)
    {
        return response()->json(['office' => $office]);
    }

    public function delete(Request $request)
    {
        $office = CountryOffice::findOrFail($request->officeId);

        $flow = Flow::where('country_office_id',$office->id)->first();
        if (!empty($flow)) {
            return response()->json(['message' => 'This Office can not be delete,this Area attached with Flow'], Response::HTTP_BAD_REQUEST);
        }
        if (!$office->delete()) {
            return response()->json(['message' => 'Country Office Failed to Delete!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Country Office Deleted Successfully!']);
    }
}
