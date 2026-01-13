<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => User::factory(),
            'name' => $this->faker->company(),
            'slug' => $this->faker->unique()->slug(3),
            'description' => $this->faker->sentence(12),
            'logo_url' => $this->faker->imageUrl(120, 120, 'business', true),
            'banner_url' => $this->faker->imageUrl(1200, 400, 'fashion', true),
            'policies' => $this->faker->paragraph(3),
        ];
    }
}
