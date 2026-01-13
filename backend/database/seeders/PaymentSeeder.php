<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        if (Payment::count() > 0) {
            return;
        }

        foreach (Order::all() as $order) {
            Payment::factory()->create([
                'order_id' => $order->id,
                'amount' => $order->total,
                'status' => 'paid',
                'provider' => 'stripe',
                'created_at' => $order->created_at,
            ]);
        }
    }
}
