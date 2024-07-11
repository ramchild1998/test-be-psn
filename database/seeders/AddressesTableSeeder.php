<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{
    public function run()
    {
        $addresses = [
            [
                'customer_id' => 1,
                'address' => 'Kawasan Karyadeka Pancamurni Blok A Kav. 3',
                'district' => 'Cikarang Selatan',
                'city' => 'Bekasi',
                'province' => 'Jawa Barat',
                'postal_code' => 17530
            ]
        ];
        foreach ($addresses as $address) {
            DB::table('addresses')->insert($address);
        }
    }
}
