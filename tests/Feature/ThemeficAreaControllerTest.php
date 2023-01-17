<?php

namespace Tests\Feature;

use App\Models\ThemeficArea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThemeficAreaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_authenticate_user_view_themeficarea()
    {

        $this->authentic_user();

        $response = $this->get('/themefic-area');

        $response->assertStatus(200);
    }
    public function test_authenticate_user_create_themeficarea()
    {

        $this->authentic_user();
        //create themefic area
        $response = $this->from(route('themefic-area.view'))
            ->post(route('themefic-area.store'), [
                'name' => 'Immunization area creation test',
                'code' => '29-05',
            ]);

        $response->assertStatus(200);

    }

    public function test_authenticate_user_update_themeficarea()
    {

        $this->authentic_user();

        $response = $this->from(route('themefic-area.view'))
            ->post(route('themefic-area.store'), [
                'name' => 'Immunization area creation test',
                'code' => '30-01',
            ]);

        $area = ThemeficArea::first();

        $response = $this->patch(route('themefic-area.update', $area->id), [

            'name' => 'New Immunization area',
            'code' => '31-01',
        ]);

        $update_area = ThemeficArea::first();

        $this->assertEquals('New Immunization area', $update_area->name);
        $this->assertEquals('31-01', $update_area->code);

    }

    public function test_authenticate_user_can_delete_themeficarea()
    {
        $this->authentic_user();

        $response = $this->from(route('themefic-area.view'))
        ->post(route('themefic-area.store'), [
            'name' => 'Immunization area creation test',
            'code' => '30-01',
        ]);

        $area = ThemeficArea::first();

        $response = $this->delete(route('themefic-area.areaDeleteById', $area->id));

        $this->assertEquals(1, ThemeficArea::count());

    }

}
