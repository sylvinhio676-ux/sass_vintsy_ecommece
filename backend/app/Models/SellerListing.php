<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerListing extends Model
{
    /** @use HasFactory<\Database\Factories\SellerListingFactory> */
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'product_sku',
        'title',
        'photo_url',
        'seller_account_id',
        'price',
        'status',
        'last_sync',
        'error_message',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'last_sync' => 'datetime',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }
}
