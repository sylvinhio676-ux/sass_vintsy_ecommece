<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPublishedListing extends Model
{
    /** @use HasFactory<\Database\Factories\SellerPublishedListingFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'sku',
        'title',
        'description',
        'category',
        'brand',
        'condition_status',
        'material',
        'size',
        'price',
        'package_size',
        'seller_account_id',
        'vinted_listing_id',
        'vinted_url',
        'status',
        'published_date',
        'last_sync_date',
        'boost_active',
        'is_hidden',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'published_date' => 'datetime',
        'last_sync_date' => 'datetime',
        'boost_active' => 'boolean',
        'is_hidden' => 'boolean',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }

    public function product()
    {
        return $this->belongsTo(SellerProduct::class, 'product_id');
    }

    public function photos()
    {
        return $this->hasMany(SellerPublishedListingPhoto::class, 'published_listing_id');
    }

    public function analytics()
    {
        return $this->hasOne(SellerListingAnalytic::class, 'published_listing_id');
    }

    public function analyticsHistory()
    {
        return $this->hasMany(SellerListingAnalyticsHistory::class, 'published_listing_id');
    }

    public function insights()
    {
        return $this->hasMany(SellerListingInsight::class, 'published_listing_id');
    }
}
