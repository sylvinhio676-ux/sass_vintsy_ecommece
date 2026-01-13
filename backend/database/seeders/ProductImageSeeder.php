<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        if (ProductImage::count() > 0) {
            return;
        }

        $products = Product::all();

        foreach ($products as $product) {
            ProductImage::factory(2)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
