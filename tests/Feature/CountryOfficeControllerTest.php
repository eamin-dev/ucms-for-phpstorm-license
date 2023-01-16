<?php

namespace Tests\Feature;

use App\Models\CountryOffice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryOfficeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_authenticate_user_access_country_office()
    {

        $this->authentic_user();

        $response = $this->get('/country-offices');

        $response->assertStatus(200);
    }

    public function test_authenticate_user_can_create_country_office()
    {

        $this->authentic_user();

        $response = $this->from(route('offices.view'))
            ->post(route('offices.store'), [
                'name' => 'Vietnam',
            ]);

        $response->assertStatus(200);

    }

    public function test_authenticate_user_can_update_country_office()
    {
        $this->authentic_user();
        //create Country Office
        $response = $this->from(route('offices.view'))
            ->post(route('offices.store'), [
                'name' => 'Vietnam',
            ]);

        $country_office = CountryOffice::first();
        //update country office
        $response = $this->patch(route('offices.update', $country_office->id), [
            'name' => 'Combodia',
        ]);

        $update_country_office = CountryOffice::first();
        $this->assertEquals('Combodia', $update_country_office->name);

    }

    public function test_authenticate_user_can_delete_country_office()
    {
        $this->authentic_user();

        //create Country Office
        $response = $this->from(route('offices.view'))
            ->post(route('offices.store'), [
                'name' => 'Vietnam',
            ]);

        $country_office = CountryOffice::first();

        $response = $this->delete(route('offices.delete', $country_office->id));

        $this->assertEquals(1, CountryOffice::count());

    }
}
