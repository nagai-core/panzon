<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('items')->insert([
            [
                'category_id' => 1,
                'item_name' => 'パンA',
                'price' => 200,
                'content' => '美味しいパンです。',
            ],
            [
                'category_id' => 2,
                'item_name' => '世界一メロンパン',
                'price' => 300,
                'content' => 'ヨーグルト入りです。',
            ],
            [
                'category_id' => 3,
                'item_name' => 'チョコクッキー',
                'price' => 150,
                'content' => '買ってください',
            ],
            [
                'category_id' => 4,
                'item_name' => '豆カレーパン',
                'price' => 100,
                'content' => '焼き立て',
            ],
        ]);
    }
}
