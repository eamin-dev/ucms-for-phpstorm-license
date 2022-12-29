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
        User::create([
                'name'=>'Amirul Islam',
                'email'=>'amirul@admin.com',
                'password'=> bcrypt(12345678),
                'role_id'=>1,
                'platform'=>3,
                'status'=>1,

        ]);
    }
}