<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    public function run(): void
    {
        if (Conversation::count() > 0) {
            return;
        }

        $shops = Shop::all();
        $customers = User::role('customer')->get();

        foreach ($shops as $shop) {
            Conversation::factory(2)->create([
                'shop_id' => $shop->id,
                'user_id' => $customers->random()->id,
            ]);
        }
    }
}
