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

        $this->authentic_user();

        $response = $this->get(route('rapid.flow.view'));

        $response->assertStatus(200);
    }

    public function test_authenticate_user_can_create_rapidflow(){

        $this->authentic_user();
        
    }
}
