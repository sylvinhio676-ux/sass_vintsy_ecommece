<?php

namespace Database\Factories;

use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerProductMaterial>
 */
class SellerProductMaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => SellerProduct::factory(),
            'material' => $this->faker->randomElement(['Cotton', 'Denim', 'Leather', 'Wool']),
        ];
    }
}
