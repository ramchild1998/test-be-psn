<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('customers')->truncate();
        DB::table('addresses')->truncate();
        $this->call(CustomersTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
    }
}
