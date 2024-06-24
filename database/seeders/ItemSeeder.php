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
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'パンA',
                'price' => 200,
                'content' => '美味しいパンです。',
                'created_at' => now(),
            ],
            [
                'category_id' => 2,
                'owner_id' => 1,
                'is_variable' => false,
                'item_name' => '世界一メロンパン',
                'price' => 300,
                'content' => 'ヨーグルト入りです。',
                'created_at' => now(),
            ],
            [
                'category_id' => 3,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'チョコクッキー',
                'price' => 150,
                'content' => '買ってください',
                'created_at' => now(),
            ],
            [
                'category_id' => 4,
                'owner_id' => 2,
                'is_variable' => true,
                'item_name' => '豆カレーパン',
                'price' => 100,
                'content' => '焼き立て',
                'created_at' => now(),
            ],
            [
                'category_id' => 5,
                'owner_id' => 1,
                'is_variable' => true,
                'item_name' => 'クロワッサン',
                'price' => 250,
                'content' => '焼き立て',
                'created_at' => now(),
            ],
            [
                'category_id' => 6,
                'owner_id' => 2,
                'is_variable' => true,
                'item_name' => 'あんパン',
                'price' => 120,
                'content' => '美味しいよー',
                'created_at' => '2024/06/22',
            ],
            [
                'category_id' => 1,
                'owner_id' => 2,
                'is_variable' => true,
                'item_name' => 'パン',
                'price' => 150,
                'content' => '焼き立て',
                'created_at' => '2024/06/23',
            ],
        ]);
    }
}
