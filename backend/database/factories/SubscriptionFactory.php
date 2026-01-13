<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['active', 'trial', 'canceled', 'past_due']);
        $startedAt = $this->faker->dateTimeBetween('-3 months', '-1 week');

        return [
            'shop_id' => Shop::factory(),
            'plan_id' => Plan::factory(),
            'status' => $status,
            'started_at' => $startedAt,
            'ends_at' => $status === 'canceled' ? $this->faker->dateTimeBetween($startedAt, 'now') : null,
        ];
    }
}
