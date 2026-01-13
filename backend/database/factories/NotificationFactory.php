<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(['order', 'message', 'system']),
            'data_json' => [
                'title' => $this->faker->sentence(6),
                'detail' => $this->faker->sentence(10),
            ],
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
