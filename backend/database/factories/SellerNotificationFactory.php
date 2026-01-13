<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerNotification>
 */
class SellerNotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kind' => $this->faker->randomElement(['sale', 'message', 'offer', 'system']),
            'title' => $this->faker->sentence(6),
            'details' => $this->faker->sentence(10),
            'seller_account_id' => SellerAccount::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
