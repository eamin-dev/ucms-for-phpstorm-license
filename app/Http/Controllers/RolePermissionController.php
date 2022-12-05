<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Repositories\RolePermissionRepository;
use App\Utilities\AppHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RolePermissionController extends Controller
{
    private $rolePermissionRepository;
    public $user;
    public $message = 'Sorry !! you are unauthorized for this action';
    public function __construct(RolePermissionRepository $roleRepository)
    {
        $this->rolePermissionRepository = $roleRepository;
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    private function isAuthorized(string $permission): bool
    {
        return  is_null($this->user) || !$this->user->can($permission);
    }

    public function index()
    {
        abort_if($this->isAuthorized('role'), Response::HTTP_FORBIDDEN, $this->message);
        $roles =$this->rolePermissionRepository->paginate('id', [], 10);
        $permissions = $this->rolePermissionRepository->allPermissions();
        return view('rolePermission.index',compact('roles','permissions'));
    }

    public function createNewRole(RoleCreateRequest $request)
    {
        abort_if($this->isAuthorized('role'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $this->rolePermissionRepository->storeRolePermission($request->validated());
            return AppHelper::successResponse('Role created successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null, $e);
        }
    }

    public function getRolePermissions($role_id)
    {
        abort_if($this->isAuthorized('role'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $role = $this->rolePermissionRepository->getRole($role_id);
            $permissions = $this->rolePermissionRepository->allPermissions();
            return view('rolePermission.role_edit_form', compact('role', 'permissions'));
        } catch (\Exception $e) {
            return AppHelper::errorRedirect($e);
        }
    }

    public function editRolePermission(RoleUpdateRequest $request)
    {
        abort_if($this->isAuthorized('role'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $role_id = AppHelper::decrypt($request->role_id);
            $role = $this->rolePermissionRepository->getRole($role_id);
            $this->rolePermissionRepository->updateRolePermission($role,$request->validated());
            return AppHelper::successResponse('Role updated successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null, $e);
        }
    }

    public function removeRole($role_id)
    {
        abort_if($this->isAuthorized('role'), Response::HTTP_FORBIDDEN, $this->message);
        try {
            $this->rolePermissionRepository->deleteRolePermission($role_id);
            return AppHelper::successResponse('Role deleted successfully');
        } catch (\Exception $e) {
            return AppHelper::errorResponse(null, $e);
        }
    }

}
