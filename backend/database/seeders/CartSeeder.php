<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        if (Cart::count() > 0) {
            return;
        }

        $customers = User::role('customer')->get();

        foreach ($customers as $customer) {
            Cart::factory()->create([
                'user_id' => $customer->id,
            ]);
        }
    }
}
