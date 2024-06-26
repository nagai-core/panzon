<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example image URLs
        $imageFilenames = ['shokupan.jpg', 'melonpan.jpg', 'cookie.jpg', 'currypan.jpg','croissants.jpg','anpan.jpg'];
        // $itemId =0;
        // foreach ($imageFilenames as $imageUrl) {
        //     // Get the full URL to the image
        //     $path = 'pan/' . $imageUrl;
        //     $url = Storage::url($path);
        //     $itemId++;
        //     // Insert into the database
        //     DB::table('images')->insert([
        //         'item_id' => $itemId,
        //         'is_variable' => true,
        //         'url' => $url,
        //     ]);
        // }
        // $path1 = 'pan/cookie2.jpg';
        // DB::table('images')->insert([
        //     'item_id' => 3,
        //     'is_variable' => false,
        //     'url' => Storage::url($path1),
        // ]);
        // $path2 = 'pan/pan2.jpg';
        // DB::table('images')->insert([
        //     'item_id' => 7,
        //     'is_variable' => false,
        //     'url' => Storage::url($path2),
        // ]);
       // ダミーデータを生成
        $dummyData = [];
        for ($i = 1; $i < 24; $i++) {
            // ランダムに画像ファイル名を選択
            $url = '/storage/pan/' . $imageFilenames[array_rand($imageFilenames)];

            // ダミーデータを追加
            $dummyData[] = [
                'item_id' => $i,
                'is_variable' => 1,
                'url' => $url,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // ダミーデータを一括挿入
        DB::table('images')->insert($dummyData);
    }
}


