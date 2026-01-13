<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerOrderBundleItem extends Model
{
    /** @use HasFactory<\Database\Factories\SellerOrderBundleItemFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'title',
        'sku',
        'thumbnail_url',
    ];

    public function order()
    {
        return $this->belongsTo(SellerOrder::class, 'order_id');
    }
}
