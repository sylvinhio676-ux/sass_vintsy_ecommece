<?php

namespace Database\Seeders;

use App\Models\SellerPublishedListing;
use App\Models\SellerPublishedListingPhoto;
use Illuminate\Database\Seeder;

class SellerPublishedListingPhotoSeeder extends Seeder
{
    public function run(): void
    {
        if (SellerPublishedListingPhoto::count() > 0) {
            return;
        }

        foreach (SellerPublishedListing::all() as $listing) {
            SellerPublishedListingPhoto::factory(2)->create([
                'published_listing_id' => $listing->id,
            ]);
        }
    }
}
