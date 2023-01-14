<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionAreaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_authenticate_user_can_view_region()
    {
        $user = User::factory()->create();

        $response = $this->post('login', [
            'email'=> $user->email,
            'password'=>'password',

        ]);
        $this->assertAuthenticated();

        $response = $this->get(route('regions.view'));

        $response->assertStatus(200);
    }

    public function test_authenticate_user_can_create_region(){

         $user = User::factory()->create();

        $response = $this->post('login', [
            'email'=> $user->email,
            'password'=>'password',

        ]);
        $this->assertAuthenticated();

        $response = $this->from(route('regions.view'))
            ->post(route('regions.store'), [
                'name'=>'Europe',
                'created_by'=>$user->id,
            ]);

        $response->assertStatus(200);

    }
}