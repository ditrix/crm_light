<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ApiCustomerTest extends TestCase
{

    use RefreshDatabase;

    public function  test_customer_store()
    {

        $data = [
            'name' => 'John',
            'email' => 'john@mail.com',
            'phone' => '+380660646332',
            'address' => 'str John',
            // 'is_legal' => true,
            'code'      => '222',
            'contact_name'=> 'Mary',
            'contact_email'=> 'mary@mail.com',
            'contact_phone'=> '+380660646300'
        ];

        $response = $this->postJson('api/customers',$data);

//        $response->dump();

        $response->assertStatus(201)
          ->assertJson([
            'data' => $data
        ]);
    }

    public function  test_customer_get()
    {

        $data = [
            'name' => 'John',
            'email' => 'john@mail.com',
            'phone' => '+380660646332',
            'address' => 'str John',
            // 'is_legal' => true,
            'code'      => '222',
            'contact_name'=> 'Mary',
            'contact_email'=> 'mary@mail.com',
            'contact_phone'=> '+380660646300'
        ];

        $response = $this->postJson('api/customers',$data);

        $response->assertStatus(201);

        $response= $this->getJson('api/customers');

        $response->assertStatus(200);
    }


    public function test_customer_show()
    {
        $data = [
            'name' => 'John',
            'email' => 'john@mail.com',
            'phone' => '+380660646332',
            'address' => 'str John',
            // 'is_legal' => true,
            'code'      => '222',
            'contact_name'=> 'Mary',
            'contact_email'=> 'mary@mail.com',
            'contact_phone'=> '+380660646300'
        ];

        $response = $this->postJson('api/customers',$data);

        $response->assertStatus(201);

        $customerId = $response->json('data.id');

        $response = $this->getJson('api/customers/'.$customerId);

        $response->assertStatus(200)
            ->assertJson([
                'data' => $data
            ]);

    }

    public function test_customer_update(){

        $data = [
            'name' => 'John',
            'email' => 'john@mail.com',
            'phone' => '+380660646332',
            'address' => 'str John',
            'is_legal' => true,
            'code'      => '222',
            'contact_name'=> 'Mary',
            'contact_email'=> 'mary@mail.com',
            'contact_phone'=> '+380660646300'
        ];
        $response = $this->postJson('api/customers',$data);

        $response->assertStatus(201);

        $customerId = $response->json('data.id');

        $updated_data = [
            'name' => 'John',
            'email' => 'john@mail.com',
            'phone' => '+380660646444',
            'address' => 'str John',
            'is_legal' => false,
            'code'      => '222',
            'contact_name'=> 'Mary',
            'contact_email'=> 'mary@mail.com',
            'contact_phone'=> '+380660646300'
        ];

        $response = $this->putJson('api/customers/'.$customerId, $updated_data);

       // $response->dump();

        $response->assertStatus(200)
            ->assertJson([
                'data' => $updated_data
            ]);

    }


}
