<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\CustomerController;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get('/customer');
        $response->assertJsonStructure(['data' => ['*' => ['id', 'title', 'name', 'gender', 'phone_number', 'image', 'email', 'created_at', 'updated_at']])->assertStatus(200);
    }

    public function testShow()
    {
        $customer = Customer::factory()->create();
        $response = $this->get('/customer/' . $customer->id);
        $response->assertJsonStructure(['data' => ['*' => ['id', 'title', 'name', 'gender', 'phone_number', 'image', 'email', 'address' => ['*' => ['id', 'address', 'district', 'city', 'province', 'postal_code', 'created_at', 'updated_at']]]])->assertStatus(200);
    }

    public function testStore()
    {
        $data = [
            'title' => 'Mr',
            'name' => 'Adrien Philippe',
            'gender' => 'M',
            'phone_number' => '085222334445',
            'image' => 'https://img.freepik.com/premium-vector/man-avatar-profile-round-icon_24640-14044.jpg',
            'email' => 'adrien.philippe@gmail.com'
        ];
        $response = $this->post('/customer', $data);
        $response->assertJsonStructure(['data' => ['id', 'title', 'name', 'gender', 'phone_number', 'image', 'email', 'created_at', 'updated_at']])->assertStatus(201);
    }

    public function testUpdate()
    {
        $customer = Customer::factory()->create();
        $data = [
            'title' => 'Mr',
            'name' => 'Adrien Philippe',
            'gender' => 'M',
            'phone_number' => '085222334445',
            'image' => 'https://img.freepik.com/premium-vector/man-avatar-profile-round-icon_24640-14044.jpg',
            'email' => 'adrien.philippe@gmail.com'
        ];
        $response = $this->patch('/customer/' . $customer->id, $data);
        $response->assertJsonStructure(['data' => ['id', 'title', 'name', 'gender', 'phone_number', 'image', 'email', 'created_at', 'updated_at']])->assertStatus(200);
    }

    public function testDestroy()
    {
        $customer = Customer::factory()->create();
        $response = $this->delete('/customer/' . $customer->id);
        $response->assertJsonStructure(['message' => 'Customer deleted'])->assertStatus(200);
    }
}
