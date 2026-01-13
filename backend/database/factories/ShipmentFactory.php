<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['preparing', 'shipped', 'delivered']);
        $shippedAt = $status === 'preparing' ? null : $this->faker->dateTimeBetween('-10 days', '-2 days');

        return [
            'order_id' => Order::factory(),
            'carrier' => $this->faker->randomElement(['Colissimo', 'DHL', 'UPS']),
            'tracking_number' => strtoupper($this->faker->bothify('TRK######')),
            'status' => $status,
            'shipped_at' => $shippedAt,
            'delivered_at' => $status === 'delivered' ? $this->faker->dateTimeBetween('-2 days', 'now') : null,
        ];
    }
}
