<?php

namespace Database\Seeders;

use App\Models\CountryOffice;
use Illuminate\Database\Seeder;

class CountryOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c_offices = [
            [
                'name' => 'Bangladesh',
                'created_at' => now()
            ],
            [
                'name' => 'Brazil',
                'created_at' => now()
            ],
            [
                'name' => 'India',
                'created_at' => now()
            ],
            [
                'name' => 'Pakistan',
                'created_at' => now()
            ]
        ];

        CountryOffice::insert($c_offices);
    }
}
