<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'title' => $this->faker->optional()->word(),
            'price' => $this->faker->randomFloat(2, 8, 250),
            'stock' => $this->faker->numberBetween(0, 50),
            'sku' => strtoupper($this->faker->bothify('VAR-#####')),
        ];
    }
}
