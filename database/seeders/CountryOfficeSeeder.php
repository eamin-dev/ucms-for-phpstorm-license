<?php

namespace Database\Seeders;

use App\Models\CountryOffice;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class CountryOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::orderBy('id','asc')->first()->id;
        $c_offices = [
            [
                'name' => 'Bangladesh',
                'created_by'=>$user,
                'created_at' => now()
            ],
            [
                'name' => 'Brazil',
                'created_by'=>$user,
                'created_at' => now()
            ],
            [
                'name' => 'India',
                'created_by'=>$user,
                'created_at' => now()
            ],
            [
                'name' => 'Pakistan',
                'created_by'=>$user,
                'created_at' => now()
            ]
        ];

        CountryOffice::insert($c_offices);
    }
}
