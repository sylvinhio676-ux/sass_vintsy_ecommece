<?php

namespace Database\Seeders;

use App\Models\SellerProduct;
use App\Models\SellerProductMaterial;
use Illuminate\Database\Seeder;

class SellerProductMaterialSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerProductMaterial::count() > 0) {
            return;
        }

        foreach (SellerProduct::all() as $product) {
            SellerProductMaterial::factory()->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
