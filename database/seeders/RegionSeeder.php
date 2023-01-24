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
                'image' => 'asia.png'
            ],
            [
                'id' => 2,
                "name" => "Africa",
                "code" => 'AF',
                'image' => 'africa.svg'
            ],
            [
                'id' => 3,
                'code' => 'EU',
                'name' => 'Europe',
                'image' => 'europe.png'
            ],
            [
                'id' => 4,
                'code' => 'SA',
                "name" => "South America",
                'image' => 'north.svg'
            ],
            [
                'id' => 5,
                'code' => 'NA',
                "name" => "North America",
                'image' => 'north.svg'
            ],
            [
                "id" => 6,
                "code" => 'AN',
                "name" => "Antarctica",
                'image' => 'ant.png'
            ],
            [
                'id' => 7,
                'code' => 'AUS',
                "name" => "Australia",
                'image' => 'australia.png'
            ]
        ];

        Region::insert($regions);
    }
}
