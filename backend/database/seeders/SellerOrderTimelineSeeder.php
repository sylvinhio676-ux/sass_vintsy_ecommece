<?php

namespace Database\Seeders;

use App\Models\SellerOrder;
use App\Models\SellerOrderTimeline;
use Illuminate\Database\Seeder;

class SellerOrderTimelineSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerOrderTimeline::count() > 0) {
            return;
        }

        foreach (SellerOrder::all() as $order) {
            SellerOrderTimeline::factory(2)->create([
                'order_id' => $order->id,
            ]);
        }
    }
}
