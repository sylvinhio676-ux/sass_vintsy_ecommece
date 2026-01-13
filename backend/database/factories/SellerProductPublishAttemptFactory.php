<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerProductPublishAttempt>
 */
class SellerProductPublishAttemptFactory extends Factory
{
    public function definition(): array
    {
        $status = $this->faker->randomElement(['success', 'failed']);

        return [
            'product_id' => SellerProduct::factory(),
            'seller_account_id' => SellerAccount::factory(),
            'status' => $status,
            'error_message' => $status === 'failed' ? 'Image quality too low' : null,
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
