<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OwnerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('owner_addresses')->insert([
            [
                'owner_id' => 1,
                'store_name' => 'Store A',
                'address' => '123 Main St',
                'post_code' => '12345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'owner_id' => 2,
                'store_name' => 'Store B',
                'address' => '456 Elm St',
                'post_code' => '67890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
