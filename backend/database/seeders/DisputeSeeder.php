<?php

namespace Database\Seeders;

use App\Models\Dispute;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DisputeSeeder extends Seeder
{
    public function run(): void
    {
        if (Dispute::count() > 0) {
            return;
        }

        $orders = Order::all();
        if ($orders->isEmpty()) {
            return;
        }

        Dispute::factory(2)->create([
            'order_id' => $orders->random()->id,
        ]);
    }
}
