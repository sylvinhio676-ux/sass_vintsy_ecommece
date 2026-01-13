<?php

namespace Database\Seeders;

use App\Models\SellerListingInsight;
use App\Models\SellerPublishedListing;
use Illuminate\Database\Seeder;

class SellerListingInsightSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerListingInsight::count() > 0) {
            return;
        }

        foreach (SellerPublishedListing::all() as $listing) {
            SellerListingInsight::factory(2)->create([
                'published_listing_id' => $listing->id,
            ]);
        }
    }
}
