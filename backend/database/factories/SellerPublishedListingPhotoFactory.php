<?php

namespace Database\Factories;

use App\Models\SellerPublishedListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerPublishedListingPhoto>
 */
class SellerPublishedListingPhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'published_listing_id' => SellerPublishedListing::factory(),
            'url' => $this->faker->imageUrl(640, 640, 'fashion', true),
            'position' => $this->faker->numberBetween(0, 4),
        ];
    }
}
