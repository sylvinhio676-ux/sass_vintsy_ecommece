<?php

namespace Database\Seeders;

use App\Models\SellerProduct;
use App\Models\SellerProductPhoto;
use Illuminate\Database\Seeder;

class SellerProductPhotoSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerProductPhoto::count() > 0) {
            return;
        }

        foreach (SellerProduct::all() as $product) {
            SellerProductPhoto::factory(2)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
