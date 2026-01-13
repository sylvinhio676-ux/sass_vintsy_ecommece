<?php

namespace Database\Seeders;

use App\Models\SellerConversation;
use App\Models\SellerSystemEvent;
use Illuminate\Database\Seeder;

class SellerSystemEventSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerSystemEvent::count() > 0) {
            return;
        }

        foreach (SellerConversation::all() as $conversation) {
            SellerSystemEvent::factory()->create([
                'conversation_id' => $conversation->id,
            ]);
        }
    }
}
