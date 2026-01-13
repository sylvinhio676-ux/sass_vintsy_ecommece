<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerOrder extends Model
{
    /** @use HasFactory<\Database\Factories\SellerOrderFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'order_type',
        'source',
        'seller_account_id',
        'title',
        'sku',
        'price',
        'status',
        'category',
        'thumbnail_url',
        'buyer_name',
        'buyer_username',
        'seller_name',
        'seller_username',
        'shipping_street',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'fees_item_price',
        'fees_shipping_fee',
        'fees_service_fee',
        'fees_total',
        'processed',
        'purchase_cost',
        'quantity',
        'tracking_number',
        'tracking_carrier',
        'tracking_url',
        'is_bundle',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'fees_item_price' => 'decimal:2',
        'fees_shipping_fee' => 'decimal:2',
        'fees_service_fee' => 'decimal:2',
        'fees_total' => 'decimal:2',
        'processed' => 'boolean',
        'purchase_cost' => 'decimal:2',
        'quantity' => 'integer',
        'is_bundle' => 'boolean',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }

    public function timelines()
    {
        return $this->hasMany(SellerOrderTimeline::class, 'order_id');
    }

    public function bundleItems()
    {
        return $this->hasMany(SellerOrderBundleItem::class, 'order_id');
    }
}
