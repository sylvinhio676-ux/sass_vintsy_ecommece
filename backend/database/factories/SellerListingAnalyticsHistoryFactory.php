<?php

namespace Database\Factories;

use App\Models\SellerPublishedListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerListingAnalyticsHistory>
 */
class SellerListingAnalyticsHistoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'published_listing_id' => SellerPublishedListing::factory(),
            'metric' => $this->faker->randomElement(['views', 'favorites', 'offers']),
            'value' => $this->faker->numberBetween(0, 50),
            'recorded_at' => $this->faker->dateTimeBetween('-14 days', 'now'),
        ];
    }
}
