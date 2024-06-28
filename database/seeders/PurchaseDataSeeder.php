<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PurchaseHistory;
use App\Models\ItemOrder;

class PurchaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PurchaseHistory::factory()
        ->count(100)
        ->has(ItemOrder::factory()->count(3))
        ->create();
    }
}
