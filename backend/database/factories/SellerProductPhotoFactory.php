<?php

namespace Database\Factories;

use App\Models\SellerProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerProductPhoto>
 */
class SellerProductPhotoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => SellerProduct::factory(),
            'url' => $this->faker->imageUrl(640, 640, 'fashion', true),
            'position' => $this->faker->numberBetween(0, 4),
        ];
    }
}
