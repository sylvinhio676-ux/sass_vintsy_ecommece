<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerListingInsight extends Model
{
    /** @use HasFactory<\Database\Factories\SellerListingInsightFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'published_listing_id',
        'insight_type',
        'severity',
        'data_json',
        'created_at',
    ];

    protected $casts = [
        'data_json' => 'array',
        'created_at' => 'datetime',
    ];

    public function listing()
    {
        return $this->belongsTo(SellerPublishedListing::class, 'published_listing_id');
    }
}
