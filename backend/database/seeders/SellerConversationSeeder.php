<?php

namespace Database\Seeders;

use App\Models\SellerAccount;
use App\Models\SellerConversation;
use Illuminate\Database\Seeder;

class SellerConversationSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerConversation::count() > 0) {
            return;
        }

        foreach (SellerAccount::all() as $account) {
            SellerConversation::factory(2)->create([
                'seller_account_id' => $account->id,
            ]);
        }
    }
}
