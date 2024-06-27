<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PurchaseHistory;
use App\Models\User;
use App\Models\UserAddress;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseHistory>
 */
class PurchaseHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $addressId = UserAddress::inRandomOrder()->first()->id;
        return [
            //
            'user_id' => '1',
            'address_id' => $addressId,
            'created_at' => $this->faker->dateTimeBetween('-2 year', 'now'),
            'updated_at' => now(),
        ];
    }
}
