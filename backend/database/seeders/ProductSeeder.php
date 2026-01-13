<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        if (Product::count() > 0) {
            return;
        }

        $shops = Shop::all();
        $categories = Category::all();

        foreach ($shops as $shop) {
            Product::factory(6)->create([
                'shop_id' => $shop->id,
                'category_id' => $categories->random()->id,
                'status' => 'published',
            ]);
        }
    }
}
