<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticate_user_can_access_admin_data()
    {
        $this->authentic_user();
        //direct view to a specific route
        $response = $this->get('/admins/index');

        $response->assertStatus(200);
    }
}
