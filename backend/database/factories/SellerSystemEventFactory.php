<?php

namespace Database\Factories;

use App\Models\SellerConversation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerSystemEvent>
 */
class SellerSystemEventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conversation_id' => SellerConversation::factory(),
            'event_type' => $this->faker->randomElement(['sold', 'shipped', 'delivered']),
            'event_data' => ['note' => $this->faker->sentence(6)],
            'occurred_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
        ];
    }
}
