<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryOfficeControllerTest extends TestCase {
    /**
    * A basic feature test example.
    *
    * @return void
    */
    use RefreshDatabase;
    public function test_authenticate_user_access_country_office() {
        $user = User::factory()->create();
        $response = $this->post( 'login', [
            'email'=> $user->email,
            'password'=>'password',
        ] );
        $this->assertAuthenticated();

        $response = $this->get( '/country-offices' );

        $response->assertStatus( 200 );
    }

    public function test_authenticate_user_can_create_country_office() {

        $user = User::factory()->create();
        $response = $this->post( 'login', [
            'email'=> $user->email,
            'password'=>'password',
        ] );
        $this->assertAuthenticated();

        $response = $this->from( route( 'offices.view' ) )
        ->post( route( 'offices.store' ), [
            'name'=>'Bangladesh',
        ]);

        $response->assertStatus(200);

    }
}