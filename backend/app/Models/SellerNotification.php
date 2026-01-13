<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerNotification extends Model
{
    /** @use HasFactory<\Database\Factories\SellerNotificationFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kind',
        'title',
        'details',
        'seller_account_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }
}
