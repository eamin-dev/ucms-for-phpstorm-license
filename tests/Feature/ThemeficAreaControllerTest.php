<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ThemeficAreaControllerTest extends TestCase {
    /**
    * A basic feature test example.
    *
    * @return void
    */

    use RefreshDatabase;
    //passed
    public function test_loggedin_user_view_themeficarea() {

        $user = User::factory()->create();
        $response = $this->post( 'login', [
            'email'=> $user->email,
            'password'=>'password',
        ] );
        $this->assertAuthenticated();
        $response = $this->get( '/themefic-area' );

        $response->assertStatus( 200 );
    }


    //passed

    //Create e new Themefic Area
    public function test_loggedin_user_create_themeficarea() {

        //factory user
        $user = User::factory()->create();
        $response = $this->post( 'login', [
            'email'=> $user->email,
            'password'=>'password',
        ] );
        $this->assertAuthenticated();

        $response = $this->from( route( 'themefic-area.view' ) )
        ->post( route( 'themefic-area.store' ), [
            'name'=>'Immunization area creation test',
            'code'=> '29-05'
        ] );

        $response->assertStatus( 200 );

    }

}