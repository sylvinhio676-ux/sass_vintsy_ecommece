<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seller_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->nullable()->constrained('shops')->nullOnDelete();
            $table->string('name', 120);
            $table->string('username', 120);
            $table->string('email', 190);
            $table->string('password_hash', 255)->nullable();
            $table->string('avatar', 8)->nullable();
            $table->boolean('is_connected')->default(false);
            $table->boolean('is_running')->default(false);
            $table->string('proxy_host', 190)->nullable();
            $table->string('proxy_port', 20)->nullable();
            $table->string('proxy_user', 120)->nullable();
            $table->string('proxy_password', 120)->nullable();
            $table->string('vnc_password', 120)->nullable();
            $table->dateTime('last_session_start')->nullable();
            $table->timestamps();
        });

        Schema::create('seller_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->nullable()->constrained('shops')->nullOnDelete();
            $table->string('sku', 64)->unique();
            $table->string('title', 255);
            $table->text('description');
            $table->string('category', 120);
            $table->string('brand', 120)->nullable();
            $table->string('condition_status', 40);
            $table->string('size', 80);
            $table->decimal('price', 10, 2);
            $table->decimal('purchase_cost', 10, 2)->nullable();
            $table->decimal('last_price', 10, 2)->nullable();
            $table->integer('quantity')->default(1);
            $table->string('package_size', 20);
            $table->string('status', 30);
            $table->text('internal_notes')->nullable();
            $table->timestamps();
        });

        Schema::create('seller_product_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('seller_products')->cascadeOnDelete();
            $table->string('url', 500);
            $table->integer('position')->default(0);
            $table->timestamps();
        });

        Schema::create('seller_product_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('seller_products')->cascadeOnDelete();
            $table->string('material', 80);
            $table->timestamps();
        });

        Schema::create('seller_product_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('seller_products')->cascadeOnDelete();
            $table->string('color', 80);
            $table->timestamps();
        });

        Schema::create('seller_product_publish_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('seller_products')->cascadeOnDelete();
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->string('status', 20);
            $table->string('error_message', 255)->nullable();
            $table->dateTime('created_at');
        });

        Schema::create('seller_listings', function (Blueprint $table) {
            $table->id();
            $table->string('listing_id', 120);
            $table->string('product_sku', 64);
            $table->string('title', 255);
            $table->string('photo_url', 500);
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->decimal('price', 10, 2);
            $table->string('status', 30);
            $table->dateTime('last_sync');
            $table->string('error_message', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('seller_published_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('seller_products')->nullOnDelete();
            $table->string('sku', 64);
            $table->string('title', 255);
            $table->text('description');
            $table->string('category', 120);
            $table->string('brand', 120)->nullable();
            $table->string('condition_status', 40);
            $table->string('material', 120)->nullable();
            $table->string('size', 80);
            $table->decimal('price', 10, 2);
            $table->string('package_size', 20);
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->string('vinted_listing_id', 120);
            $table->string('vinted_url', 500);
            $table->string('status', 20);
            $table->dateTime('published_date');
            $table->dateTime('last_sync_date');
            $table->boolean('boost_active')->default(false);
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();
        });

        Schema::create('seller_published_listing_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('published_listing_id')->constrained('seller_published_listings')->cascadeOnDelete();
            $table->string('url', 500);
            $table->integer('position')->default(0);
            $table->timestamps();
        });

        Schema::create('seller_listing_analytics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('published_listing_id')->constrained('seller_published_listings')->cascadeOnDelete();
            $table->integer('views')->default(0);
            $table->integer('favorites')->default(0);
            $table->integer('offers')->default(0);
            $table->decimal('avg_offer_price', 10, 2)->default(0);
            $table->decimal('best_offer_price', 10, 2)->default(0);
            $table->decimal('lowest_offer_price', 10, 2)->default(0);
            $table->decimal('views_trend', 6, 2)->default(0);
            $table->decimal('favorites_trend', 6, 2)->default(0);
            $table->dateTime('created_at');
        });

        Schema::create('seller_listing_analytics_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('published_listing_id')->constrained('seller_published_listings')->cascadeOnDelete();
            $table->string('metric', 20);
            $table->integer('value');
            $table->dateTime('recorded_at');
        });

        Schema::create('seller_listing_insights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('published_listing_id')->constrained('seller_published_listings')->cascadeOnDelete();
            $table->string('insight_type', 40);
            $table->string('severity', 20);
            $table->json('data_json')->nullable();
            $table->dateTime('created_at');
        });

        Schema::create('seller_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 120);
            $table->string('order_type', 20);
            $table->string('source', 20)->nullable();
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->string('title', 255);
            $table->string('sku', 64)->nullable();
            $table->decimal('price', 10, 2);
            $table->string('status', 30);
            $table->string('category', 30);
            $table->string('thumbnail_url', 500);
            $table->string('buyer_name', 120);
            $table->string('buyer_username', 120);
            $table->string('seller_name', 120)->nullable();
            $table->string('seller_username', 120)->nullable();
            $table->string('shipping_street', 190)->nullable();
            $table->string('shipping_city', 120)->nullable();
            $table->string('shipping_postal_code', 20)->nullable();
            $table->string('shipping_country', 80)->nullable();
            $table->decimal('fees_item_price', 10, 2)->default(0);
            $table->decimal('fees_shipping_fee', 10, 2)->default(0);
            $table->decimal('fees_service_fee', 10, 2)->default(0);
            $table->decimal('fees_total', 10, 2)->default(0);
            $table->boolean('processed')->default(false);
            $table->decimal('purchase_cost', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('tracking_number', 120)->nullable();
            $table->string('tracking_carrier', 120)->nullable();
            $table->string('tracking_url', 500)->nullable();
            $table->boolean('is_bundle')->default(false);
            $table->timestamps();
        });

        Schema::create('seller_order_timelines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('seller_orders')->cascadeOnDelete();
            $table->string('status', 80);
            $table->string('icon', 40)->nullable();
            $table->dateTime('occurred_at');
        });

        Schema::create('seller_order_bundle_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('seller_orders')->cascadeOnDelete();
            $table->string('title', 255);
            $table->string('sku', 64)->nullable();
            $table->string('thumbnail_url', 500);
        });

        Schema::create('seller_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_id', 80);
            $table->string('buyer_name', 120);
            $table->string('buyer_username', 120);
            $table->string('buyer_avatar', 500)->nullable();
            $table->string('item_id', 120);
            $table->string('item_title', 255);
            $table->string('item_thumbnail', 500);
            $table->decimal('item_price', 10, 2);
            $table->text('last_message');
            $table->dateTime('last_message_time');
            $table->integer('unread_count')->default(0);
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->string('status', 30);
            $table->boolean('has_label')->default(false);
            $table->timestamps();
        });

        Schema::create('seller_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('seller_conversations')->cascadeOnDelete();
            $table->string('sender_id', 80);
            $table->string('sender_name', 120);
            $table->string('sender_avatar', 500)->nullable();
            $table->text('content');
            $table->dateTime('sent_at');
            $table->boolean('is_me')->default(false);
            $table->string('image_url', 500)->nullable();
            $table->string('original_language', 40)->nullable();
        });

        Schema::create('seller_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('seller_conversations')->cascadeOnDelete();
            $table->string('sender_id', 80);
            $table->string('sender_name', 120);
            $table->string('sender_avatar', 500)->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('status', 20);
            $table->dateTime('sent_at');
            $table->boolean('is_me')->default(false);
            $table->text('message')->nullable();
            $table->foreignId('parent_offer_id')->nullable()->constrained('seller_offers')->nullOnDelete();
        });

        Schema::create('seller_system_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('seller_conversations')->cascadeOnDelete();
            $table->string('event_type', 30);
            $table->json('event_data')->nullable();
            $table->dateTime('occurred_at');
        });

        Schema::create('seller_notifications', function (Blueprint $table) {
            $table->id();
            $table->string('kind', 30);
            $table->string('title', 255);
            $table->text('details');
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->dateTime('created_at');
        });

        Schema::create('seller_favorites', function (Blueprint $table) {
            $table->id();
            $table->string('item_id', 120);
            $table->string('item_title', 255);
            $table->string('item_sku', 64)->nullable();
            $table->decimal('item_price', 10, 2);
            $table->string('item_thumbnail', 500);
            $table->foreignId('seller_account_id')->constrained('seller_accounts')->cascadeOnDelete();
            $table->string('user_handle', 120);
            $table->string('user_name', 120);
            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seller_favorites');
        Schema::dropIfExists('seller_notifications');
        Schema::dropIfExists('seller_system_events');
        Schema::dropIfExists('seller_offers');
        Schema::dropIfExists('seller_messages');
        Schema::dropIfExists('seller_conversations');
        Schema::dropIfExists('seller_order_bundle_items');
        Schema::dropIfExists('seller_order_timelines');
        Schema::dropIfExists('seller_orders');
        Schema::dropIfExists('seller_listing_insights');
        Schema::dropIfExists('seller_listing_analytics_history');
        Schema::dropIfExists('seller_listing_analytics');
        Schema::dropIfExists('seller_published_listing_photos');
        Schema::dropIfExists('seller_published_listings');
        Schema::dropIfExists('seller_listings');
        Schema::dropIfExists('seller_product_publish_attempts');
        Schema::dropIfExists('seller_product_colors');
        Schema::dropIfExists('seller_product_materials');
        Schema::dropIfExists('seller_product_photos');
        Schema::dropIfExists('seller_products');
        Schema::dropIfExists('seller_accounts');
    }
};
