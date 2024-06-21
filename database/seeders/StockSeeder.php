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
            ['item_id' => 1, 'amount' => 10],
            ['item_id' => 2, 'amount' => 5],
            ['item_id' => 3, 'amount' => 15],
            ['item_id' => 4, 'amount' => 8],
        ]);
    }
}
