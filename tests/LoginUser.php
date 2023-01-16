<?php

namespace Tests;

use App\Models\User;

trait loginUser
{

    public $user;
    public function authentic_user()
    {

        //create User
        $this->user = User::factory()->create();

        //login User
        $response = $this->post('login', [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

    }

}
