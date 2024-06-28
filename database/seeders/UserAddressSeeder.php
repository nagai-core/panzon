<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_addresses')->insert([
            [
                'user_id' => 1,
                'address' => 'core tech',
                'post_code' => '12345',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'address' => '宇宙',
                'post_code' => '67890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
