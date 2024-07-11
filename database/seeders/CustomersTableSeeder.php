<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            [
                'title' => 'Mr',
                'name' => 'Adrien Philippe',
                'gender' => 'M',
                'phone_number' => '085222334445',
                'image' => 'https://img.freepik.com/premium-vector/man-avatar-profile-round-icon_24640-14044.jpg',
                'email' => 'adrien.philippe@gmail.com'
            ]
        ];
        foreach ($customers as $customer) {
            DB::table('customers')->insert($customer);
        }
    }
}
