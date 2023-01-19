<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ThemeficAreaSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CountryOfficeSeeder::class);
        $this->call(CountrySeeder::class);
    }
}
