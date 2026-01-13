<?php

namespace Database\Seeders;

use App\Models\SellerConversation;
use App\Models\SellerMessage;
use Illuminate\Database\Seeder;

class SellerMessageSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerMessage::count() > 0) {
            return;
        }

        foreach (SellerConversation::all() as $conversation) {
            SellerMessage::factory(3)->create([
                'conversation_id' => $conversation->id,
            ]);
        }
    }
}
