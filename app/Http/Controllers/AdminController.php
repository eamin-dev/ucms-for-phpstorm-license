<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Region;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function view(Request $request)
    {
//        return $data = User::with(['region'])->role(['super admin','admin'])->get();
        if (!$request->ajax()) {
            $regions = Region::select('id', 'name')->get();
            $countries = Country::select('id', 'name')->get();
            return view('admin.index', compact('regions','countries'));
        }
        $data = User::with(['region'])->role(['super admin','admin']);
        return $this->renderViewDataTable($data);
    }

    private function renderViewDataTable($data)
    {
        return DataTables::eloquent($data)
            ->addIndexColumn()
            ->addColumn('actionBtn', function($data){
                return view('admin.actionBtn',compact('data'));
            })
            ->rawColumns(['actionBtn'])
            ->toJson();
    }

    public function store(Request $request)
    {
        list($rules) = $this->validationRulesAndMessages('add', null);

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->region_id = $request->region_id;
        $admin->country_office_id = $request->country_id;
        $admin->password = bcrypt($request->password);
//        $admin->type = 1;
        $admin->assignRole('admin');
        if (!$admin->save()) {
            return response()->json(['message' => 'Admin  Failed to Save!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Admin  Saved Successfully!']);
    }

    private function validationRulesAndMessages($type, $id)
    {
        if ($type === 'add') {
            $rules = [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')],
                'region_id' => 'required',
                'password' => 'required',

            ];
        }

        if (!is_null($id)) {

            $rules = [
                'name' => 'required',
                'email' => ['required', Rule::unique('users')->ignore($id)],
                'region_id' => 'required',
                'password' => 'nullable',
            ];
        }

        return [$rules];
    }

    public function update(Request $request, User $admin)
    {
        list($rules, $customMessages) = $this->validationRulesAndMessages(null, $admin->id);

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->region_id = $request->region_id;
        $admin->assignRole('admin');

        if (!$admin->save()) {
            return response()->json(['message' => 'Admin Failed to Update!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Admin Updated Successfully!']);
    }

    public function getadminById(User $admin)
    {

        return response()->json(['admin' => $admin]);
    }

    public function admindelete(Request $request)
    {
        $user = User::findOrFail($request->adminId);

        if (!$user->delete()) {
            return response()->json(['message' => 'Admin Failed to Delete!'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => 'Admin  Deleted Successfully!']);

    }
}
