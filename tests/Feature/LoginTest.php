<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        $this->user = User::factory()->create([
            'password' => bcrypt('secret'),
        ]);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get(route('login.user'));

        $response->assertStatus(200);
        $response->assertSeeText('Login');
    }

    public function test_guest_user_not_viewing_dashboard()
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_users_can_login()
    {
        $response = $this->post(route('login.user'), [
            'email' => $this->user->email,
            'password' => 'secret',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard'));
    }

    public function test_user_authenticated()
    {
        $response = $this->actingAs($this->user)->get(route('dashboard'));

        $this->assertAuthenticated();
    }

}
