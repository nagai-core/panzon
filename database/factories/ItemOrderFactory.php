<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ItemOrder;
use App\Models\PurchaseHistory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemOrder>
 */
class ItemOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'item_id' => $this->faker->numberBetween(1, 30),
            'purchase_history_id' => PurchaseHistory::factory(),
            'amount' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->numberBetween(100, 500),
        ];
    }
}
