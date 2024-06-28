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
                'address' => '東京都千代田区1-1',
                'post_code' => '111-2222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'owner_id' => 2,
                'store_name' => 'Store B',
                'address' => '大阪府大阪市北区2-2',
                'post_code' => '222-3333',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'owner_id' => 3,
                'store_name' => 'Store C',
                'address' => '京都府京都市中京区3-3',
                'post_code' => '333-4444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'owner_id' => 4,
                'store_name' => 'Store D',
                'address' => '北海道札幌市中央区4-4',
                'post_code' => '444-5555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'owner_id' => 5,
                'store_name' => 'Store E',
                'address' => '福岡県福岡市博多区5-5',
                'post_code' => '555-6666',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
