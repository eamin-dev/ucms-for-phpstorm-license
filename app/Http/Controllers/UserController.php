<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\CountryOffice;
use App\Models\Setting;
use App\Models\User;
use App\Repositories\RolePermissionRepository;
use App\Repositories\UserRepository;
use App\Utilities\AppHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private $userRepository;
    private $rolePermissionRepository;
    public $user;
    public $message = 'Sorry !! you are unauthorized for this action';

    public function __construct(UserRepository $userRepository, RolePermissionRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->rolePermissionRepository = $roleRepository;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    // private function isAuthorized(string $permission): bool
    // {
    //     return  is_null($this->user) || !$this->user->can($permission);
    // }

//     public function index()
//     {
// //        abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
//         try {
//             $search = request()->input('search');
//             $filter = request()->input('status');
//             $users = $this->userRepository->paginate('id', [], 10, ['status' => $filter], $search);
//           //  $countryOffices = CountryOffice::select('id', 'name')->get();
//             $roles = $this->rolePermissionRepository->allRoles();
//             return view('user.index', compact('users','roles','countryOffices'));
//         } catch (\Exception $e) {
//             return AppHelper::errorRedirect($e);
//         }
//     }


    public function index(){

        $users = User::with(['countryOffice'])->where('type', 2)->paginate(15);
         $countryOffices = CountryOffice::select('id', 'name')->get();
        $roles=Role::whereIn('name',['iogt','rapidpro','both'])->get();
        return view('user.index', compact('users','roles','countryOffices'));

    }

    public function createNewUser(UserCreateRequest $request)
    {
        //abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
        try {
           // $this->userRepository->storeUser($request->validated());
           $user = new User();
           $user->name =  $request->name;
           $user->email = $request->email;
           $user->password = Hash::make($request->password);
            $user->country_office_id = $request->country_office_id;
          // $user->platform = $data['platform'];
           $user->assignRole($request->input('role'));
           $user->type = 2;
           $user->save();
            return AppHelper::successResponse('User created successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null,$e);
        }
    }

    public function deleteUser($user_id)
    {
        //abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $user = $this->userRepository->getUser($user_id);
            //need to check if user has dependency
            $this->userRepository->destroyUser($user);
            return AppHelper::successResponse('User deleted successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null,$e);
        }
    }

    public function editUser($user_id)
    {
       // abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $user = $this->userRepository->getUser($user_id);
            $roles=Role::whereNotIn('id',[1,2])->get();
            $countryOffices = CountryOffice::select('id', 'name')->get();
            return view('user.user_edit_form', compact('user','roles','countryOffices'));
        } catch (\Exception $e) {
            return AppHelper::errorRedirect($e);
        }
    }

    public function updateUserInfo(UserUpdateRequest $request)
    {
      //  abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $user_id = AppHelper::decrypt($request->user_id);
            $user = $this->userRepository->getUser($user_id);
            $this->userRepository->updateUser($user,$request->validated());
            return AppHelper::successResponse('User updated successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null,$e);
        }
    }

    public function changeUserStatus($user_id, $status)
    {
       // abort_if($this->isAuthorized('user'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $user = $this->userRepository->getUser($user_id);
            $this->userRepository->statusUpdate($user,$status);
            return AppHelper::successResponse('User status changed to '.Setting::status()[$status]);
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null,$e);
        }
    }

    public function showUserSettings(){
        try {
            return view('setting.index');
        } catch (\Exception $e) {
            return AppHelper::errorRedirect($e);
        }
    }
}
