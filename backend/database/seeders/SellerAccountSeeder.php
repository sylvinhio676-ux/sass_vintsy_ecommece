<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class SellerAccountSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerAccount::count() > 0) {
            return;
        }

        foreach (Shop::all() as $shop) {
            SellerAccount::factory()->create([
                'shop_id' => $shop->id,
                'name' => $shop->name,
                'email' => 'seller+' . $shop->id . '@example.com',
            ]);
        }
    }
}
