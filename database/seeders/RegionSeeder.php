<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                "name" => "Asia",
                "created_by" => User::first()->id,
                "created_at" => now()
            ],
            [
                "name" => "Europe",
                "created_by" => User::first()->id,
                "created_at" => now()
            ],
        ];

        Region::insert($regions);
    }
}
