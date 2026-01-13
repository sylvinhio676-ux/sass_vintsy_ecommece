<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SellerAccount>
 */
class SellerAccountFactory extends Factory
{
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'name' => $this->faker->company(),
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password_hash' => $this->faker->sha256(),
            'avatar' => strtoupper($this->faker->randomLetter()),
            'is_connected' => $this->faker->boolean(80),
            'is_running' => $this->faker->boolean(50),
            'proxy_host' => $this->faker->optional()->ipv4(),
            'proxy_port' => $this->faker->optional()->numberBetween(1000, 9000),
            'proxy_user' => $this->faker->optional()->userName(),
            'proxy_password' => $this->faker->optional()->password(),
            'vnc_password' => $this->faker->optional()->password(),
            'last_session_start' => $this->faker->optional()->dateTimeBetween('-2 weeks', 'now'),
        ];
    }
}
