<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('categories')->insert([
            ['name' => '食パン'],
            ['name' => 'メロンパン'],
            ['name' => 'クッキー'],
            ['name' => 'カレーパン'],
            ['name' => 'クロワッサン'],
            ['name' => 'あんパン'],
            ['name' => 'ベーグル'],
            ['name' => 'デニッシュ'],
            ['name' => 'バゲット'],
            ['name' => 'フォカッチャ'],
            ['name' => 'ブリオッシュ'],
            ['name' => 'エクレア'],
            ['name' => 'マフィン'],
            ['name' => 'ドーナツ'],
            ['name' => 'パウンドケーキ'],
            ['name' => 'シュトーレン'],
            ['name' => 'シナモンロール'],
            ['name' => 'スコーン'],
            ['name' => 'パニーニ'],
            ['name' => 'フィセル'],
            ['name' => 'ガレット'],
            ['name' => 'クラフティ'],
            ['name' => 'ブレッドスティック'],
            ['name' => 'パン・ド・カンパーニュ'],
            ['name' => 'パン・ド・ミ'],
            ['name' => 'ピザ'],
            ['name' => 'ピタパン'],
            ['name' => 'ライ麦パン'],
            ['name' => 'ロールパン'],
            ['name' => 'サンドイッチ']
        ]);
    }
}
