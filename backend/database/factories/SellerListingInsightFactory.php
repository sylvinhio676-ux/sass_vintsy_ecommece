<?php

namespace Database\Factories;

use App\Models\SellerPublishedListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerListingInsight>
 */
class SellerListingInsightFactory extends Factory
{
    public function definition(): array
    {
        return [
            'published_listing_id' => SellerPublishedListing::factory(),
            'insight_type' => $this->faker->randomElement(['photos', 'oldListing', 'lowEngagement', 'offersLow']),
            'severity' => $this->faker->randomElement(['info', 'warning', 'critical']),
            'data_json' => ['note' => $this->faker->sentence(6)],
            'created_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
        ];
    }
}
