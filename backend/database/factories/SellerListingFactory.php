<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerListing>
 */
class SellerListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'listing_id' => strtoupper($this->faker->bothify('VT-#######')),
            'product_sku' => strtoupper($this->faker->bothify('VM-#####')),
            'title' => $this->faker->words(5, true),
            'photo_url' => $this->faker->imageUrl(640, 640, 'fashion', true),
            'seller_account_id' => SellerAccount::factory(),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'status' => $this->faker->randomElement(['queued', 'posting', 'active', 'failed', 'paused']),
            'last_sync' => $this->faker->dateTimeBetween('-5 days', 'now'),
            'error_message' => $this->faker->optional()->sentence(6),
        ];
    }
}
