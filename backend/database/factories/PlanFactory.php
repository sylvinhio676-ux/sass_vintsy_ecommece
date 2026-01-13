<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->randomElement(['Starter', 'Pro', 'Scale']);

        return [
            'name' => $name,
            'product_limit' => $name === 'Scale' ? null : ($name === 'Starter' ? 50 : 200),
            'price_monthly' => $name === 'Starter' ? 29.00 : ($name === 'Pro' ? 99.00 : 249.00),
        ];
    }
}
