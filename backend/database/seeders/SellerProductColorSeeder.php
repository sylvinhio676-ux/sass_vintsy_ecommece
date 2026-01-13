<?php

namespace Database\Seeders;

use App\Models\SellerProduct;
use App\Models\SellerProductColor;
use Illuminate\Database\Seeder;

class SellerProductColorSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerProductColor::count() > 0) {
            return;
        }

        foreach (SellerProduct::all() as $product) {
            SellerProductColor::factory()->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
