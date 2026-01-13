<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        if (Order::count() > 0) {
            return;
        }

        $customers = User::role('customer')->get();

        foreach ($customers as $customer) {
            Order::factory(2)->create([
                'user_id' => $customer->id,
                'status' => 'paid',
                'total' => 0,
            ]);
        }
    }
}
