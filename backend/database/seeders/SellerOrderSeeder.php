<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerOrder;
use Illuminate\Database\Seeder;

class SellerOrderSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerOrder::count() > 0) {
            return;
        }

        foreach (SellerAccount::all() as $account) {
            SellerOrder::factory(2)->create([
                'seller_account_id' => $account->id,
            ]);
        }
    }
}
