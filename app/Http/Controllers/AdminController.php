<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
     public function view(Request $request)
    {
        if (!$request->ajax()) {
            $regions = Region::select('id', 'name')->get();
            return view('rapidflow.flow', compact('regions'));
        }
        $data = User::query()->where('');
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('date', function ($data) {
                return Carbon::parse($data->created_at)->format('d M, y');
            })
            ->addColumn('time', function ($data) {
                return Carbon::parse($data->created_at)->format('h:i A');
            })
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

        $flow = new User();
        $flow->region_id = $request->region_id;
        $flow->country_office_id = $request->country_office_id;
//        $flow->date = $request->date;
        $flow->file_id = $request->file_id;
        $flow->themefic_area_id = $request->themefic_area_id;
        $flow->created_by = auth()->user()->id;
        if (!$flow->save()) {
            return response()->json(['message' => 'Rapid-Pro Flow Failed to Save!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Rapid-Pro Flow Saved Successfully!']);
    }

    private function validationRulesAndMessages($type, $id)
    {
        if ($type === 'add') {
            $rules = [
                'region_id' => 'required',
                'country_office_id' => 'required',
//                'date' => 'required',
                'themefic_area_id' => 'required',
                'file_id' => ['required', Rule::unique('flows')],
            ];

            $customMessages = [
                'country_office_id.required' => 'Country office Field is required.',
//                'date.required' => 'Date  Field is required.',
                'themefic_area_id.required' => 'Themefic Area is required.',
                'file_id.required' => 'File Id is required.',
                'file_id.unique' => 'File Id has already been taken.',
            ];
        }

        if (!is_null($id)) {

            $rules = [
                'country_office_id' => 'required',
//                'date' => 'required',
                'themefic_area_id' => 'required',
                'file_id' => ['required', Rule::unique('flows')->ignore($id)],
            ];

            $customMessages = [
                'country_office_id.required' => 'Country office Field is required.',
//                'date.required' => 'Date  Field is required.',
                'themefic_area_id.required' => 'Themefic Area is required.',
                'file_id.required' => 'File Id is required.',
                'file_id.unique' => 'File Id has already been taken.',
            ];
        }

        return [$rules, $customMessages];
    }

    public function update(Request $request, User $admin)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null, $admin->id);

        $error = Validator::make($request->all(), $rules, $customMessages);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->region_id = $request->region_id;

        if (!$admin->save()) {
            return response()->json(['message' => 'Admin Failed to Update!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Admin Updated Successfully!']);
    }

    public function getRapidFlowId(User $admin)
    {

        return response()->json(['admin' => $admin]);
    }

    public function flowDeleteById(Request $request)
    {
        $user = User::findOrFail($request->flowId);

        if (!$user->delete()) {
            return response()->json(['message' => 'Admin Flow Failed to Delete!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Admin Flow Deleted Successfully!']);

   }
}