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
                'id' => 1,
                "name" => "Asia",
                'code' => 'AS',
                "created_at" => now()
            ],
            [
                'id' => 2,
                "name" => "Africa",
                "code" => 'AF',
                "created_at" => now()
            ],
            [
                'id' => 3,
                'code' => 'EU',
                'name' => 'Europe',
                "created_at"=> now()
            ],
            [
                'id' => 4,
                'code' => 'SA',
                "name" => " South America",
                "created_at" => now()
            ],
            [
                'id' => 5,
                'code' => 'NA',
                "name" => " North America",
                "created_at" => now()
            ],
            [
                "id" => 6,
                "code" => 'AN',
                "name" => "Antarctica",
                "created_at" => now()
            ],
            [
                'id' => 7,
                'code' => 'AUS',
                "name" =>"Australia",
                "created_at"=> now()
            ]
        ];

        Region::insert($regions);
    }
}
