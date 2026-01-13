<?php

namespace Database\Seeders;

use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use Illuminate\Database\Seeder;

class ProductAttributeValueSeeder extends Seeder
{
    public function run(): void
    {
        if (ProductAttributeValue::count() > 0) {
            return;
        }

        $attributeValues = AttributeValue::all();
        $products = Product::all();

        foreach ($products as $product) {
            $values = $attributeValues->random(3);
            foreach ($values as $value) {
                ProductAttributeValue::create([
                    'product_id' => $product->id,
                    'attribute_value_id' => $value->id,
                ]);
            }
        }
    }
}
