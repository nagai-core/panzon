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
            ['item_id' => 1,'amount' => 10, 'created_at' => '2024-06-20 12:00:00'],
            ['item_id' => 2,'amount' => 5, 'created_at' => '2024-06-21 10:30:00'],
            ['item_id' => 3,'amount' => 15, 'created_at' => '2024-06-22 14:45:00'],
            ['item_id' => 4,'amount' => 8, 'created_at' => '2024-06-23 09:20:00'],
            ['item_id' => 5,'amount' => 100, 'created_at' => '2024-06-24 16:10:00'],
            ['item_id' => 6,'amount' => 20, 'created_at' => '2024-06-25 13:55:00'],
            ['item_id' => 7,'amount' => 40, 'created_at' => '2024-06-26 08:40:00'],
            ['item_id' => 8,'amount' => 60, 'created_at' => '2024-06-27 17:25:00'],
            ['item_id' => 9,'amount' => 30, 'created_at' => '2024-06-28 11:15:00'],
            ['item_id' => 10,'amount' => 25, 'created_at' => '2024-06-29 15:30:00'],
            ['item_id' => 11, 'amount' => 70, 'created_at' => '2024-07-01 10:00:00'],
            ['item_id' => 12, 'amount' => 90, 'created_at' => '2024-07-02 12:30:00'],
            ['item_id' => 13, 'amount' => 80, 'created_at' => '2024-07-03 14:20:00'],
            ['item_id' => 14, 'amount' => 35, 'created_at' => '2024-07-04 09:45:00'],
            ['item_id' => 15, 'amount' => 65, 'created_at' => '2024-07-05 16:55:00'],
            ['item_id' => 16, 'amount' => 50, 'created_at' => '2024-07-06 08:10:00'],
            ['item_id' => 17, 'amount' => 75, 'created_at' => '2024-07-07 18:40:00'],
            ['item_id' => 18, 'amount' => 45, 'created_at' => '2024-07-08 11:50:00'],
            ['item_id' => 19, 'amount' => 55, 'created_at' => '2024-07-09 15:15:00'],
            ['item_id' => 20, 'amount' => 85, 'created_at' => '2024-07-10 13:20:00'],
            ['item_id' => 21, 'amount' => 95, 'created_at' => '2024-07-11 09:30:00'],
            ['item_id' => 22, 'amount' => 42, 'created_at' => '2024-07-12 17:10:00'],
            ['item_id' => 23, 'amount' => 68, 'created_at' => '2024-07-13 08:45:00'],
            ['item_id' => 1, 'amount' => 28, 'created_at' => '2024-07-14 16:25:00'],
            ['item_id' => 5,'amount' => 75, 'created_at' => '2024-07-15 11:55:00'],
            ['item_id' => 16,'amount' => 37, 'created_at' => '2024-07-16 14:35:00'],
            ['item_id' => 21,'amount' => 47, 'created_at' => '2024-07-17 10:25:00'],
            ['item_id' => 17,'amount' => 82, 'created_at' => '2024-07-18 12:15:00'],
            ['item_id' => 12,'amount' => 23, 'created_at' => '2024-07-19 16:00:00'],
            ['item_id' => 8,'amount' => 58, 'created_at' => '2024-07-20 09:40:00'],
            ['item_id' => 15,'amount' => 63, 'created_at' => '2024-07-21 18:20:00'],
        ]);
    }
}
