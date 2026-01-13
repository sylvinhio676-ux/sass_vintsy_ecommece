<?php

namespace Database\Factories;

use App\Models\SellerConversation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerOffer>
 */
class SellerOfferFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conversation_id' => SellerConversation::factory(),
            'sender_id' => $this->faker->uuid(),
            'sender_name' => $this->faker->name(),
            'sender_avatar' => $this->faker->imageUrl(80, 80, 'people', true),
            'amount' => $this->faker->randomFloat(2, 10, 150),
            'status' => $this->faker->randomElement(['sent', 'accepted', 'declined', 'countered']),
            'sent_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'is_me' => $this->faker->boolean(),
            'message' => $this->faker->optional()->sentence(8),
            'parent_offer_id' => null,
        ];
    }
}
