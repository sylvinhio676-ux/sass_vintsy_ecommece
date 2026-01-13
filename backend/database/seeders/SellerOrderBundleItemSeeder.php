<?php

namespace Database\Seeders;

use App\Models\SellerOrder;
use App\Models\SellerOrderBundleItem;
use Illuminate\Database\Seeder;

class SellerOrderBundleItemSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerOrderBundleItem::count() > 0) {
            return;
        }

        $bundleOrders = SellerOrder::where('is_bundle', true)->get();

        foreach ($bundleOrders as $order) {
            SellerOrderBundleItem::factory(2)->create([
                'order_id' => $order->id,
            ]);
        }
    }
}
