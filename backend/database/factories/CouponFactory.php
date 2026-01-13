<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => strtoupper($this->faker->unique()->bothify('SAVE###')),
            'discount_type' => $this->faker->randomElement(['percent', 'fixed']),
            'discount_value' => $this->faker->randomFloat(2, 5, 30),
            'starts_at' => $this->faker->dateTimeBetween('-1 month', '-1 week'),
            'ends_at' => $this->faker->dateTimeBetween('now', '+2 months'),
            'max_uses' => $this->faker->numberBetween(10, 200),
        ];
    }
}
