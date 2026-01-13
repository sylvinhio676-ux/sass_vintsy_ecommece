<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        if (OrderItem::count() > 0) {
            return;
        }

        $products = Product::all();
        $shops = Shop::all();

        foreach (Order::all() as $order) {
            $items = $products->random(2);
            $total = 0;

            foreach ($items as $product) {
                $quantity = random_int(1, 2);
                $price = $product->price;
                $total += $price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'shop_id' => $shops->random()->id,
                    'product_id' => $product->id,
                    'variant_id' => null,
                    'price' => $price,
                    'quantity' => $quantity,
                ]);
            }

            $order->update(['total' => $total]);
        }
    }
}
