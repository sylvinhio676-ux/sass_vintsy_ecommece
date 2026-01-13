<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        if (Message::count() > 0) {
            return;
        }

        $users = User::all();

        foreach (Conversation::all() as $conversation) {
            Message::factory(3)->create([
                'conversation_id' => $conversation->id,
                'sender_id' => $users->random()->id,
            ]);
        }
    }
}
