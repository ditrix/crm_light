<?php

namespace Tests\Feature;

use App\Models\Deal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ApiDealTest extends TestCase
{


    public function _test_store_deal(): void
    {
        $data = [
            'title'         => 'Some deal',
            'type'          => 'deal type',
            'is_active'     => true,
            'active_from'   => null,
            'active_to'     => null,
        ];

        $response = $this->postJson('api/deals',$data);
        //$response->dump();
        $response->assertStatus(201);
    }

    public function _test_show_deal():void
    {
        $data = [
            'title'         => 'Some show deal',
            'type'          => 'deal show type',
            'is_active'     => true,
            'active_from'   => '2023-07-21',
            'active_to'     => null,
        ];

        $response = $this->postJson('api/deals',$data);

        $response->assertStatus(201);

        $dealId = $response->json('data.id');

        $response = $this->getJson('api/deals/'. $dealId);

        $updated_data = $response->json('data');

        assertEquals($data, $updated_data);

        $updated_data['title'] = 'Some show deal updated';


        $response = $this->putJson('api/deals',$updated_data);
        $data = $response->json('data');
        $response->assertStatus(200)
           ->assertJson(['data' => $updated_data]);

    }

    public function test_update_deal(){
        $data = [
            'title'         => 'Some show deal',
            'type'          => 'deal show type',
            'is_active'     => true,
            'active_from'   => '2023-07-21',
            'active_to'     => null,
        ];

        $response = $this->postJson('api/deals',$data);

        $response->assertStatus(201);

        $dealId = $response->json('data.id');

        $response = $this->getJson('api/deals/'. $dealId);
    }

}
