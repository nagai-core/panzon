<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('stocks')->insert([
            ['item_id' => 1, 'amount' => 10,'created_at' => now(),],
            ['item_id' => 2, 'amount' => 5,'created_at' => now(),],
            ['item_id' => 3, 'amount' => 15,'created_at' => now(),],
            ['item_id' => 4, 'amount' => 8,'created_at' => now(),],
            ['item_id' => 1, 'amount' => 100,'created_at' => now(),],
        ]);
    }
}
