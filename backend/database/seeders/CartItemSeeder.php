<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        if (CartItem::count() > 0) {
            return;
        }

        $products = Product::all();

        foreach (Cart::all() as $cart) {
            $items = $products->random(2);
            foreach ($items as $product) {
                CartItem::factory()->create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'variant_id' => null,
                    'quantity' => random_int(1, 2),
                ]);
            }
        }
    }
}
