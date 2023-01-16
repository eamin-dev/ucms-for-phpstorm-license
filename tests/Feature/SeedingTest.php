<?php

namespace Tests\Feature;

use Database\Seeders\AdminSeeder;
use Database\Seeders\CountryOfficeSeeder;
use Database\Seeders\RegionSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\ThemeficAreaSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeedingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_ucms_seeding_working_fine()
    {

        $this->seed([
          //  AdminSeeder::class,
            CountryOfficeSeeder::class,
          //  RegionSeeder::class,
          //  RolePermissionSeeder::class,
           // ThemeficAreaSeeder::class,

        ]);

        $response = $this->get('/dashboard');

        //$response->assertSee('seed done successfully');

        //$response->assertStatus(200);
    }
}
