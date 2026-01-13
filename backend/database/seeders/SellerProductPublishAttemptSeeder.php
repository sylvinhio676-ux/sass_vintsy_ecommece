<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerProduct;
use App\Models\SellerProductPublishAttempt;
use Illuminate\Database\Seeder;

class SellerProductPublishAttemptSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerProductPublishAttempt::count() > 0) {
            return;
        }

        $accounts = SellerAccount::all();

        foreach (SellerProduct::all() as $product) {
            SellerProductPublishAttempt::factory()->create([
                'product_id' => $product->id,
                'seller_account_id' => $accounts->random()->id,
            ]);
        }
    }
}
