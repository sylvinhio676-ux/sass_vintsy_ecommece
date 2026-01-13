<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerListingAnalyticsHistory extends Model
{
    /** @use HasFactory<\Database\Factories\SellerListingAnalyticsHistoryFactory> */
    use HasFactory;

    protected $table = 'seller_listing_analytics_history';

    public $timestamps = false;

    protected $fillable = [
        'published_listing_id',
        'metric',
        'value',
        'recorded_at',
    ];

    protected $casts = [
        'value' => 'integer',
        'recorded_at' => 'datetime',
    ];

    public function listing()
    {
        return $this->belongsTo(SellerPublishedListing::class, 'published_listing_id');
    }
}
