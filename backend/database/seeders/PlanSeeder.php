<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            ['name' => 'Starter', 'product_limit' => 50, 'price_monthly' => 29.00],
            ['name' => 'Pro', 'product_limit' => 200, 'price_monthly' => 99.00],
            ['name' => 'Scale', 'product_limit' => null, 'price_monthly' => 249.00],
        ];

        foreach ($plans as $plan) {
            Plan::firstOrCreate(['name' => $plan['name']], $plan);
        }
    }
}
