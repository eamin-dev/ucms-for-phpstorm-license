<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles
        $roleArray = [
            ['name' => 'super admin', 'guard_name' => 'web'],
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'editor', 'guard_name' => 'web']
        ];
        $roles = Role::insert($roleArray);

        //Permission List as Array
        $permissionArray = [
            ['name' => 'dashboard', 'guard_name' => 'web'],
            ['name' => 'rapid_pro', 'guard_name' => 'web'],
            ['name' => 'iogt', 'guard_name' => 'web'],
            ['name' => 'user', 'guard_name' => 'web'],
            ['name' => 'role', 'guard_name' => 'web'],
        ];
        $permissions = Permission::insert($permissionArray);

        Role::where('name', 'admin')->first()->givePermissionTo(Permission::all()->pluck('name'));

    }
}
