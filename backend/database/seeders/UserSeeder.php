<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (User::count() > 0) {
            return;
        }

        $superAdmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);
        $superAdmin->assignRole('super_admin');

        User::factory(2)->create()->each(function (User $user) {
            $user->assignRole('admin');
        });

        User::factory(5)->create()->each(function (User $user) {
            $user->assignRole('seller');
        });

        User::factory(12)->create()->each(function (User $user) {
            $user->assignRole('customer');
        });
    }
}
