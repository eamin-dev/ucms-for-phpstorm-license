<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'email' => 'taylor@laravel.com',
        ]);
 
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/dashboard');
        });
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create([
            'email' => 'taylor@laravel.com',
        ]);

        $this->browse(function ($browser) use ($user){
            $browser->loginAs($user)
                    ->visit('/dashboard')
                    ->clickLink('Logout')
                    ->assertPathIs('/');
        });
        
    }
    
}
