<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerListing;
use Illuminate\Database\Seeder;

class SellerListingSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerListing::count() > 0) {
            return;
        }

        foreach (SellerAccount::all() as $account) {
            SellerListing::factory(2)->create([
                'seller_account_id' => $account->id,
            ]);
        }
    }
}
