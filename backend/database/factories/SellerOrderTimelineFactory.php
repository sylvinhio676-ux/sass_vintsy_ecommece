<?php

namespace Database\Factories;

use App\Models\SellerOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerOrderTimeline>
 */
class SellerOrderTimelineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => SellerOrder::factory(),
            'status' => $this->faker->sentence(3),
            'icon' => $this->faker->randomElement(['check', 'mail', 'truck']),
            'occurred_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
