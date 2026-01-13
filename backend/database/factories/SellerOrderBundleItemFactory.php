<?php

namespace Database\Factories;

use App\Models\SellerOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerOrderBundleItem>
 */
class SellerOrderBundleItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => SellerOrder::factory(),
            'title' => $this->faker->words(4, true),
            'sku' => $this->faker->optional()->bothify('SKU-#####'),
            'thumbnail_url' => $this->faker->imageUrl(320, 320, 'fashion', true),
        ];
    }
}
