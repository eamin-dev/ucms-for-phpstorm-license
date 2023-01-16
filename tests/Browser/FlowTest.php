<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FlowTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_flow_creation()
    {
        $user = User::factory()->create([
            'email' => 'taylor@laravel.com',
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/rapid-pro/flow')
                    // ->clickLink('Rapid Pro Flow')
                    // ->press('Create Flow')
                    ->assertButtonEnabled('Create Flow');
        });
    }
}
