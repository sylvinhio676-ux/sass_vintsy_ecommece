<?php

namespace Database\Seeders;

use App\Models\SellerConversation;
use App\Models\SellerOffer;
use Illuminate\Database\Seeder;

class SellerOfferSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerOffer::count() > 0) {
            return;
        }

        foreach (SellerConversation::all() as $conversation) {
            SellerOffer::factory()->create([
                'conversation_id' => $conversation->id,
            ]);
        }
    }
}
