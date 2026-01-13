<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\SellerFavoriteFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'item_title',
        'item_sku',
        'item_price',
        'item_thumbnail',
        'seller_account_id',
        'user_handle',
        'user_name',
        'created_at',
    ];

    protected $casts = [
        'item_price' => 'decimal:2',
        'created_at' => 'datetime',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }
}
