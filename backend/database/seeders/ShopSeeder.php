<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    public function run(): void
    {
        if (Shop::count() > 0) {
            return;
        }

        $sellers = User::role('seller')->get();

        foreach ($sellers as $seller) {
            Shop::factory()->create([
                'owner_id' => $seller->id,
                'slug' => strtolower($seller->name) . '-' . $seller->id,
            ]);
        }
    }
}
