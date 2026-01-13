<?php

namespace Database\Factories;

use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerProductColor>
 */
class SellerProductColorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => SellerProduct::factory(),
            'color' => $this->faker->safeColorName(),
        ];
    }
}
