<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerPublishedListingPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\SellerPublishedListingPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'published_listing_id',
        'url',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    public function listing()
    {
        return $this->belongsTo(SellerPublishedListing::class, 'published_listing_id');
    }
}
