<?php

namespace Database\Seeders;

use App\Models\SellerListingAnalyticsHistory;
use App\Models\SellerPublishedListing;
use Illuminate\Database\Seeder;

class SellerListingAnalyticsHistorySeeder extends Seeder
{
    public function run(): void
    {
        if (SellerListingAnalyticsHistory::count() > 0) {
            return;
        }

        foreach (SellerPublishedListing::all() as $listing) {
            SellerListingAnalyticsHistory::factory(5)->create([
                'published_listing_id' => $listing->id,
            ]);
        }
    }
}
