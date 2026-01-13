<?php

namespace Database\Factories;

use App\Models\SellerAccount;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerOrder>
 */
class SellerOrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => strtoupper($this->faker->bothify('VIN-#######')),
            'order_type' => $this->faker->randomElement(['sale', 'purchase']),
            'source' => $this->faker->optional()->randomElement(['vinted', 'manual']),
            'seller_account_id' => SellerAccount::factory(),
            'title' => $this->faker->words(5, true),
            'sku' => $this->faker->optional()->bothify('SKU-#####'),
            'price' => $this->faker->randomFloat(2, 10, 200),
            'status' => $this->faker->randomElement(['waiting_label', 'label_sent', 'shipped', 'delivered']),
            'category' => $this->faker->randomElement(['in_progress', 'finished', 'cancelled']),
            'thumbnail_url' => $this->faker->imageUrl(320, 320, 'fashion', true),
            'buyer_name' => $this->faker->name(),
            'buyer_username' => $this->faker->userName(),
            'seller_name' => $this->faker->optional()->name(),
            'seller_username' => $this->faker->optional()->userName(),
            'shipping_street' => $this->faker->streetAddress(),
            'shipping_city' => $this->faker->city(),
            'shipping_postal_code' => $this->faker->postcode(),
            'shipping_country' => $this->faker->country(),
            'fees_item_price' => $this->faker->randomFloat(2, 5, 120),
            'fees_shipping_fee' => $this->faker->randomFloat(2, 2, 15),
            'fees_service_fee' => $this->faker->randomFloat(2, 1, 10),
            'fees_total' => $this->faker->randomFloat(2, 10, 200),
            'processed' => $this->faker->boolean(),
            'purchase_cost' => $this->faker->optional()->randomFloat(2, 5, 100),
            'quantity' => $this->faker->numberBetween(1, 3),
            'tracking_number' => $this->faker->optional()->bothify('TRK-#####'),
            'tracking_carrier' => $this->faker->optional()->randomElement(['DHL', 'UPS', 'Colissimo']),
            'tracking_url' => $this->faker->optional()->url(),
            'is_bundle' => $this->faker->boolean(20),
        ];
    }
}
