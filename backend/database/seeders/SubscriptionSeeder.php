<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Shop;
use App\Models\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        if (Subscription::count() > 0) {
            return;
        }

        $plans = Plan::all();
        $shops = Shop::all();

        foreach ($shops as $shop) {
            $plan = $plans->random();
            Subscription::factory()->create([
                'shop_id' => $shop->id,
                'plan_id' => $plan->id,
                'status' => 'active',
                'started_at' => now()->subDays(30),
                'ends_at' => null,
            ]);
        }
    }
}
