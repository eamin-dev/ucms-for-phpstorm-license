<?php

namespace Database\Seeders;

use App\Models\User;
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
        $roleAdmin = Role::create(['name' => 'Admin','guard_name'=>'web']);
        $roleSuperAdmin = Role::create(['name' => 'Super Admin','guard_name'=>'web']);
        $roleEditor = Role::create(['name' => 'Editor','guard_name'=>'web']);
        $roleUser = Role::create(['name' => 'User','guard_name'=>'web']);


        //Permission List as Array
        $all_permissions = [
            'dashboard','rapid_pro','iogt','user','role'
        ];

        //Create and Assign Permission
        for ( $i=0; $i<count($all_permissions); $i++ ){
            $permission = new Permission();
            $permission -> name = $all_permissions[$i];
            $permission -> guard_name ='web';
            $permission -> save();
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);


        }

        $superAdmin = User::where('email','admin@admin.com')->first();
        if ($superAdmin) {
            $superAdmin->assignRole($roleSuperAdmin);
        }
    }
}
