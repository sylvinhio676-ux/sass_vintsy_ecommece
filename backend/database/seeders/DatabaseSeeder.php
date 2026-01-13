<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
            PlanSeeder::class,
            ShopSeeder::class,
            SubscriptionSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            AttributeValueSeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            ProductImageSeeder::class,
            ProductAttributeValueSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            PaymentSeeder::class,
            ShipmentSeeder::class,
            ReviewSeeder::class,
            ConversationSeeder::class,
            MessageSeeder::class,
            NotificationSeeder::class,
            CouponSeeder::class,
            DisputeSeeder::class,
            PageSeeder::class,
            SellerAccountSeeder::class,
            SellerProductSeeder::class,
            SellerProductPhotoSeeder::class,
            SellerProductMaterialSeeder::class,
            SellerProductColorSeeder::class,
            SellerProductPublishAttemptSeeder::class,
            SellerListingSeeder::class,
            SellerPublishedListingSeeder::class,
            SellerPublishedListingPhotoSeeder::class,
            SellerListingAnalyticSeeder::class,
            SellerListingAnalyticsHistorySeeder::class,
            SellerListingInsightSeeder::class,
            SellerOrderSeeder::class,
            SellerOrderTimelineSeeder::class,
            SellerOrderBundleItemSeeder::class,
            SellerConversationSeeder::class,
            SellerMessageSeeder::class,
            SellerOfferSeeder::class,
            SellerSystemEventSeeder::class,
            SellerNotificationSeeder::class,
            SellerFavoriteSeeder::class,
        ]);
    }
}
