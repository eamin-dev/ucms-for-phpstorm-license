<?php

namespace Tests\Feature;

use App\Models\Region;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionAreaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    public function test_authenticate_user_can_view_region()
    {
        $this->authentic_user();
        $response = $this->get(route('regions.view'));

        $response->assertStatus(200);
    }

    public function test_authenticate_user_can_create_region()
    {
        $this->authentic_user();

        $response = $this->from(route('regions.view'))
            ->post(route('regions.store'), [
                'name'=>'South America',
                'created_by'=>$this->user->id,
            ]);

        $response->assertStatus(200);

    }

    public function test_authenticate_user_can_update_region()
    {
        $this->authentic_user();

        $response = $this->from(route('regions.view'))
        ->post(route('regions.store'), [
            'name'=>'South America',
            'created_by'=>$this->user->id,
        ]);

        $region =Region::first();
        $response = $this->patch(route('regions.update',$region->id),[

            'name' => 'America',
            'updated_by'=> $this->user->id,

        ]);

        $update_region = Region::first();

        $this->assertEquals('America', $update_region->name);
        $this->assertEquals($this->user->id, $update_region->updated_by);

    }

    public function test_authenticate_user_can_delete_region()
    {

        $this->authentic_user();

        $response = $this->from(route('regions.view'))
        ->post(route('regions.store'), [
            'name'=>'South America',
            'created_by'=>$this->user->id,
        ]);

        $region =Region::first();

        $response =$this->delete(route('regions.regiondeleteById',$region->id));

        $this->assertEquals(1, Region::count());

    }
}
