<?php

namespace Tests\Feature;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AddressController;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;
    public function testStore()
    {
        $data = [
            'address' => 'Kawasan Karyadeka Pancamurni Blok A Kav. 3',
            'district' => 'Cikarang Selatan',
            'city' => 'Bekasi',
            'province' => 'Jawa Barat',
            'postal_code' => 17530
        ];
        $response = $this->post('/address', $data);
        $response->assertJsonStructure(['data' => ['id', 'address', 'district', 'city', 'province', 'postal_code', 'created_at', 'updated_at']])->assertStatus(201);
    }

    public function testUpdate()
    {
        $address = Address::factory()->create();
        $data = [
            'address' => 'Kawasan Karyadeka Pancamurni Blok A Kav. 3',
            'district' => 'Cikarang Selatan',
            'city' => 'Bekasi',
            'province' => 'Jawa Barat',
            'postal_code' => 17530
        ];
        $response = $this->patch('/address/' . $address->id, $data);
        $response->assertJsonStructure(['data' => ['id', 'address', 'district', 'city', 'province', 'postal_code', 'created_at', 'updated_at']])->assertStatus(200);
    }

    public function testDestroy()
    {
        $address = Address::factory()->create();
        $response = $this->delete('/address/' . $address->id);
        $response->assertJsonStructure(['message' => 'Address deleted'])->assertStatus(200);
    }
}
