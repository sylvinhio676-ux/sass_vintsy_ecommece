<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        if (Review::count() > 0) {
            return;
        }

        $customers = User::role('customer')->get();

        foreach (OrderItem::all() as $item) {
            Review::factory()->create([
                'product_id' => $item->product_id,
                'user_id' => $customers->random()->id,
            ]);
        }
    }
}
