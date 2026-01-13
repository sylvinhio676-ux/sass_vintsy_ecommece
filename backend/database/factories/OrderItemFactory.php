<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'shop_id' => Shop::factory(),
            'product_id' => Product::factory(),
            'variant_id' => null,
            'price' => $this->faker->randomFloat(2, 8, 250),
            'quantity' => $this->faker->numberBetween(1, 3),
        ];
    }
}
