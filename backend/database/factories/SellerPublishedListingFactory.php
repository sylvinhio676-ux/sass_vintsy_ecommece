<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerPublishedListing>
 */
class SellerPublishedListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => SellerProduct::factory(),
            'sku' => strtoupper($this->faker->bothify('VM-#####')),
            'title' => $this->faker->words(5, true),
            'description' => $this->faker->paragraph(3),
            'category' => $this->faker->randomElement(['Jeans', 'Jackets', 'Shoes', 'Accessories']),
            'brand' => $this->faker->optional()->company(),
            'condition_status' => $this->faker->randomElement(['very_good', 'good', 'fair']),
            'material' => $this->faker->optional()->word(),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'package_size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'seller_account_id' => SellerAccount::factory(),
            'vinted_listing_id' => strtoupper($this->faker->bothify('VNT-#######')),
            'vinted_url' => $this->faker->url(),
            'status' => $this->faker->randomElement(['active', 'sold']),
            'published_date' => $this->faker->dateTimeBetween('-2 months', '-2 weeks'),
            'last_sync_date' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'boost_active' => $this->faker->boolean(30),
            'is_hidden' => $this->faker->boolean(10),
        ];
    }
}
