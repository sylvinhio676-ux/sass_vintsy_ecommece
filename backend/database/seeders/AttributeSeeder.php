<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = ['Color', 'Size', 'Material', 'Condition'];

        foreach ($attributes as $name) {
            Attribute::firstOrCreate(['name' => $name]);
        }
    }
}
