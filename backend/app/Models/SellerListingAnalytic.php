<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerListingAnalytic extends Model
{
    /** @use HasFactory<\Database\Factories\SellerListingAnalyticFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'published_listing_id',
        'views',
        'favorites',
        'offers',
        'avg_offer_price',
        'best_offer_price',
        'lowest_offer_price',
        'views_trend',
        'favorites_trend',
        'created_at',
    ];

    protected $casts = [
        'views' => 'integer',
        'favorites' => 'integer',
        'offers' => 'integer',
        'avg_offer_price' => 'decimal:2',
        'best_offer_price' => 'decimal:2',
        'lowest_offer_price' => 'decimal:2',
        'views_trend' => 'decimal:2',
        'favorites_trend' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    public function listing()
    {
        return $this->belongsTo(SellerPublishedListing::class, 'published_listing_id');
    }
}
