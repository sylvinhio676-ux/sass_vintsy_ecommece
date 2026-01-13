<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerFavorite>
 */
class SellerFavoriteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_id' => strtoupper($this->faker->bothify('ITM-#####')),
            'item_title' => $this->faker->words(4, true),
            'item_sku' => $this->faker->optional()->bothify('SKU-#####'),
            'item_price' => $this->faker->randomFloat(2, 10, 150),
            'item_thumbnail' => $this->faker->imageUrl(320, 320, 'fashion', true),
            'seller_account_id' => SellerAccount::factory(),
            'user_handle' => '@' . $this->faker->userName(),
            'user_name' => $this->faker->name(),
            'created_at' => $this->faker->dateTimeBetween('-2 weeks', 'now'),
        ];
    }
}
