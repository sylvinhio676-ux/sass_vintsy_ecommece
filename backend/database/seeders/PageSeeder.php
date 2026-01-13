<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        if (Page::count() > 0) {
            return;
        }

        $pages = [
            'Terms of Service',
            'Privacy Policy',
            'FAQ',
        ];

        foreach ($pages as $title) {
            Page::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => 'Placeholder content for ' . $title,
                'updated_at' => now(),
            ]);
        }
    }
}
