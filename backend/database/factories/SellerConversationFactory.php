<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerConversation>
 */
class SellerConversationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'buyer_id' => $this->faker->uuid(),
            'buyer_name' => $this->faker->name(),
            'buyer_username' => $this->faker->userName(),
            'buyer_avatar' => $this->faker->imageUrl(80, 80, 'people', true),
            'item_id' => strtoupper($this->faker->bothify('ITM-#####')),
            'item_title' => $this->faker->words(4, true),
            'item_thumbnail' => $this->faker->imageUrl(320, 320, 'fashion', true),
            'item_price' => $this->faker->randomFloat(2, 10, 200),
            'last_message' => $this->faker->sentence(8),
            'last_message_time' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
            'unread_count' => $this->faker->numberBetween(0, 5),
            'seller_account_id' => SellerAccount::factory(),
            'status' => $this->faker->randomElement(['active', 'sold', 'shipped', 'delivered']),
            'has_label' => $this->faker->boolean(40),
        ];
    }
}
