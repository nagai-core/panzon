<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            UserAddressSeeder::class,
            OwnerSeeder::class,
            OwnerAddressSeeder::class,
            CategorySeeder::class,
            ItemSeeder::class,
            StockSeeder::class,
            ImageSeeder::class,
            PurchaseDataSeeder::class,
        ]);
    }
}
