<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@ucms.com',
            'password' => bcrypt(12345678),
            'region_id' => 1,
            'country_office_id' => 1,
//            'platform' => 3
        ]);
        $admin->assignRole('super admin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@ucms.com',
            'password' => bcrypt(12345678),
            'region_id' => 1,
            'country_office_id' => 1,
//            'platform' => 3
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Editor',
            'email' => 'editor@ucms.com',
            'password' => bcrypt(12345678),
            'region_id' => 1,
            'country_office_id' => 1,
//            'platform' => 3
        ]);
        $user->assignRole('both');

        $user = User::create([
            'name' => 'RapidPro',
            'email' => 'rqapidpro@ucms.com',
            'password' => bcrypt(12345678),
            'region_id' => 1,
            'country_office_id' => 1,
//            'platform' => 3
        ]);
        $user->assignRole('rapidpro');

        $user = User::create([
            'name' => 'iogt',
            'email' => 'iogt@ucms.com',
            'password' => bcrypt(12345678),
            'region_id' => 1,
            'country_office_id' => 1,
//            'platform' => 3
        ]);
        $user->assignRole('iogt');

    }
}
