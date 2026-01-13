<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerFavorite;
use Illuminate\Database\Seeder;

class SellerFavoriteSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerFavorite::count() > 0) {
            return;
        }

        foreach (SellerAccount::all() as $account) {
            SellerFavorite::factory(2)->create([
                'seller_account_id' => $account->id,
            ]);
        }
    }
}
