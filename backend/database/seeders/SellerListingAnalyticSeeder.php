<?php

namespace Database\Seeders;

use App\Models\SellerListingAnalytic;
use App\Models\SellerPublishedListing;
use Illuminate\Database\Seeder;

class SellerListingAnalyticSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerListingAnalytic::count() > 0) {
            return;
        }

        foreach (SellerPublishedListing::all() as $listing) {
            SellerListingAnalytic::factory()->create([
                'published_listing_id' => $listing->id,
            ]);
        }
    }
}
