<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    public function run(): void
    {
        if (Shipment::count() > 0) {
            return;
        }

        foreach (Order::all() as $order) {
            Shipment::factory()->create([
                'order_id' => $order->id,
                'status' => 'shipped',
                'shipped_at' => now()->subDays(3),
                'delivered_at' => null,
            ]);
        }
    }
}
