<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginPageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login');
        });
    }
}
