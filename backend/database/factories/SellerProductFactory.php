<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerProduct>
 */
class SellerProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'sku' => strtoupper($this->faker->bothify('VM-#####')),
            'title' => $this->faker->words(5, true),
            'description' => $this->faker->paragraph(3),
            'category' => $this->faker->randomElement(['Jeans', 'Jackets', 'Shoes', 'Accessories']),
            'brand' => $this->faker->optional()->company(),
            'condition_status' => $this->faker->randomElement(['new', 'very_good', 'good', 'fair']),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'price' => $this->faker->randomFloat(2, 10, 150),
            'purchase_cost' => $this->faker->randomFloat(2, 5, 80),
            'last_price' => $this->faker->randomFloat(2, 5, 120),
            'quantity' => $this->faker->numberBetween(1, 5),
            'package_size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'internal_notes' => $this->faker->optional()->sentence(10),
        ];
    }
}
