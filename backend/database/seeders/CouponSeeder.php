<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        if (Coupon::count() > 0) {
            return;
        }

        Coupon::factory(3)->create();
    }
}
