<?php

namespace Database\Factories;

use App\Models\SellerPublishedListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerListingAnalytic>
 */
class SellerListingAnalyticFactory extends Factory
{
    public function definition(): array
    {
        return [
            'published_listing_id' => SellerPublishedListing::factory(),
            'views' => $this->faker->numberBetween(10, 500),
            'favorites' => $this->faker->numberBetween(0, 120),
            'offers' => $this->faker->numberBetween(0, 20),
            'avg_offer_price' => $this->faker->randomFloat(2, 5, 150),
            'best_offer_price' => $this->faker->randomFloat(2, 10, 200),
            'lowest_offer_price' => $this->faker->randomFloat(2, 5, 120),
            'views_trend' => $this->faker->randomFloat(2, -20, 30),
            'favorites_trend' => $this->faker->randomFloat(2, -20, 30),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
