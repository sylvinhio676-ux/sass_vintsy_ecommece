<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        if (ProductVariant::count() > 0) {
            return;
        }

        $products = Product::all();

        foreach ($products as $product) {
            if (random_int(0, 1) === 1) {
                ProductVariant::factory(2)->create([
                    'product_id' => $product->id,
                ]);
            }
        }
    }
}
