<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerNotification;
use Illuminate\Database\Seeder;

class SellerNotificationSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerNotification::count() > 0) {
            return;
        }

        foreach (SellerAccount::all() as $account) {
            SellerNotification::factory(2)->create([
                'seller_account_id' => $account->id,
            ]);
        }
    }
}
