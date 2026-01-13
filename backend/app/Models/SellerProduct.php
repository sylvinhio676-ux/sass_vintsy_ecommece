<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProduct extends Model
{
    /** @use HasFactory<\Database\Factories\SellerProductFactory> */
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'sku',
        'title',
        'description',
        'category',
        'brand',
        'condition_status',
        'size',
        'price',
        'purchase_cost',
        'last_price',
        'quantity',
        'package_size',
        'status',
        'internal_notes',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'purchase_cost' => 'decimal:2',
        'last_price' => 'decimal:2',
        'quantity' => 'integer',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function photos()
    {
        return $this->hasMany(SellerProductPhoto::class, 'product_id');
    }

    public function materials()
    {
        return $this->hasMany(SellerProductMaterial::class, 'product_id');
    }

    public function colors()
    {
        return $this->hasMany(SellerProductColor::class, 'product_id');
    }

    public function publishAttempts()
    {
        return $this->hasMany(SellerProductPublishAttempt::class, 'product_id');
    }

    public function publishedListings()
    {
        return $this->hasMany(SellerPublishedListing::class, 'product_id');
    }
}
