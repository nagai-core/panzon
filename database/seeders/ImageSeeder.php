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
        $imageUrls = ['fish-8265114_1280.jpg'];

        foreach ($imageUrls as $imageUrl) {
            // Get the full URL to the image
            $url = Storage::url($imageUrl);

            // Insert into the database
            DB::table('images')->insert([
                'item_id' => 1,
                'url' => $url,
            ]);
        }
    }
}


