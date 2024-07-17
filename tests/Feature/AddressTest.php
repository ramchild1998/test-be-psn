<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Address;
use App\Models\Customer;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    public function testStore()
    {
        $customer = Customer::factory()->create();
        $data = [
            'customer_id' => $customer->id,
            'address' => 'Kawasan Karyadeka Pancamurni Blok A Kav. 3',
            'district' => 'Cikarang Selatan',
            'city' => 'Bekasi',
            'province' => 'Jawa Barat',
            'postal_code' => '17530'
        ];
        $response = $this->post('/api/address', $data);
        $response->assertJsonStructure([
            'id', 'customer_id', 'address', 'district', 'city', 'province', 'postal_code', 'created_at', 'updated_at'
        ])->assertStatus(201);
    }

    public function testUpdate()
    {
        $address = Address::factory()->create();
        $data = [
            'address' => 'Kawasan Karyadeka Pancamurni Blok A Kav. 3',
            'district' => 'Cikarang Selatan',
            'city' => 'Bekasi',
            'province' => 'Jawa Barat',
            'postal_code' => '17530'
        ];
        $response = $this->patch('/api/address/' . $address->id, $data);
        $response->assertJsonStructure([
            'id', 'customer_id', 'address', 'district', 'city', 'province', 'postal_code', 'created_at', 'updated_at'
        ])->assertStatus(200);
    }

    public function testDestroy()
    {
        $address = Address::factory()->create();
        $response = $this->delete('/api/address/' . $address->id);
        $response->assertJson(['message' => 'Address deleted successfully'])->assertStatus(200);
    }
}
