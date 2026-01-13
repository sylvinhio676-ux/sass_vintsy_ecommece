<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductPublishAttempt extends Model
{
    /** @use HasFactory<\Database\Factories\SellerProductPublishAttemptFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'seller_account_id',
        'status',
        'error_message',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(SellerProduct::class, 'product_id');
    }

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }
}
