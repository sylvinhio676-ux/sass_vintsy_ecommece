<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerProduct;
use App\Models\SellerPublishedListing;
use Illuminate\Database\Seeder;

class SellerPublishedListingSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerPublishedListing::count() > 0) {
            return;
        }

        $accounts = SellerAccount::all();

        foreach (SellerProduct::all() as $product) {
            SellerPublishedListing::factory()->create([
                'product_id' => $product->id,
                'seller_account_id' => $accounts->random()->id,
            ]);
        }
    }
}
