<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewRapidFlowControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_authenticate_user_can_view_rapidflow()
    {
         $user = User::factory()->create();

        $response = $this->post('login', [
            'email'=> $user->email,
            'password'=>'password',

        ]);

        $this->assertAuthenticated();

        $response = $this->get(route('rapid.flow.view'));

        $response->assertStatus(200);
    }
}