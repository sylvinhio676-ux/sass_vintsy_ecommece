<?php

namespace Database\Factories;

use App\Models\SellerConversation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerMessage>
 */
class SellerMessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conversation_id' => SellerConversation::factory(),
            'sender_id' => $this->faker->uuid(),
            'sender_name' => $this->faker->name(),
            'sender_avatar' => $this->faker->imageUrl(80, 80, 'people', true),
            'content' => $this->faker->sentence(12),
            'sent_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'is_me' => $this->faker->boolean(),
            'image_url' => $this->faker->optional()->imageUrl(320, 320, 'fashion', true),
            'original_language' => $this->faker->optional()->languageCode(),
        ];
    }
}
