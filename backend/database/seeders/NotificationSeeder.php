<?php

namespace Database\Seeders;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        if (Notification::count() > 0) {
            return;
        }

        foreach (User::all() as $user) {
            Notification::factory(2)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
