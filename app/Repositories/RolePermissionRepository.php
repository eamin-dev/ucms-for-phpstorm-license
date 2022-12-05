<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolePermissionRepository extends BaseRepository
{
    /**
     * @var string
     */
    protected $defaultGuard = 'web';

    protected $modelName = Role::class;

    protected function applySearch(Builder $instance, string $keyword = null): void
    {
        if($keyword){
            $instance->where('name', 'like', '%' . $keyword . '%');
        }
    }

    protected function applyFilters(Builder $instance, array $filters = []): void
    {
        $this->applyStatusFilter($instance, $filters);
    }

    /**
     * Filter by status.
     */
    protected function applyStatusFilter(Builder $instance, array $filters = []): void
    {
        if (Arr::get($filters, 'status')) {
            $instance->where('status', Arr::get($filters, 'status'));
        }
    }


    /**
     * @return Builder|Collection
     */
    public function allRoles()
    {
        return Role::query()->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function allPermissions()
    {
        return DB::table('permissions')->get();
    }

    /**
     * @param $role_id
     * @return Builder|Builder|Collection|Model|null
     */
    public function getRole($role_id)
    {
        return Role::query()->find($role_id);
    }

    /**
     * @param $keyword
     * @return Builder|Collection
     */
    public function searchRole($keyword = null)
    {
        return Role::query()->where('name', 'like', '%' . $keyword . '%')->get();
    }

    /**
     * @param $data
     * @return void
     */
    public function storeRolePermission($data)
    {
        DB::beginTransaction();
        try {
            $role = new Role();
            $role->name = $data['name'];
            $role->guard_name = $this->defaultGuard;
            $role->save();
            if ($role) {
                if (!empty($data['permissions'])) {
                    $role->syncPermissions($data['permissions']);
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * @param $role
     * @param $data
     * @return void
     */
    public function updateRolePermission($role, $data)
    {
        DB::beginTransaction();
        try {
            $role->name = $data['name'];
            $role->save();
            if (!empty($data['permissions'])) {
                $role->syncPermissions($data['permissions']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * @param $role_id
     * @return void
     */
    public function deleteRolePermission($role_id)
    {
        DB::beginTransaction();
        try {
            $role = Role::query()->find($role_id);
            $role->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
