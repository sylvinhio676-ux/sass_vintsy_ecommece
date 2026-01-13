<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->words(4, true),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 8, 250),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'sku' => strtoupper($this->faker->bothify('SKU-#####')),
        ];
    }
}
