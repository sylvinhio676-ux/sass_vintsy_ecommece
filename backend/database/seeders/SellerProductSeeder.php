<?php

namespace Database\Seeders;

use App\Models\SellerProduct;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class SellerProductSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerProduct::count() > 0) {
            return;
        }

        foreach (Shop::all() as $shop) {
            SellerProduct::factory(5)->create([
                'shop_id' => $shop->id,
                'status' => 'published',
            ]);
        }
    }
}
