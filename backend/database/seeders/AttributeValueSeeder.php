<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            'Color' => ['Black', 'White', 'Blue', 'Red', 'Green'],
            'Size' => ['XS', 'S', 'M', 'L', 'XL'],
            'Material' => ['Cotton', 'Denim', 'Leather', 'Wool'],
            'Condition' => ['New', 'Very Good', 'Good', 'Satisfactory'],
        ];

        foreach ($values as $attributeName => $items) {
            $attribute = Attribute::where('name', $attributeName)->first();
            if (! $attribute) {
                continue;
            }

            foreach ($items as $value) {
                AttributeValue::firstOrCreate([
                    'attribute_id' => $attribute->id,
                    'value' => $value,
                ]);
            }
        }
    }
}
