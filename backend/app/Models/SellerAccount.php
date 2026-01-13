<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerAccount extends Model
{
    /** @use HasFactory<\Database\Factories\SellerAccountFactory> */
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'username',
        'email',
        'password_hash',
        'avatar',
        'is_connected',
        'is_running',
        'proxy_host',
        'proxy_port',
        'proxy_user',
        'proxy_password',
        'vnc_password',
        'last_session_start',
    ];

    protected $casts = [
        'is_connected' => 'boolean',
        'is_running' => 'boolean',
        'last_session_start' => 'datetime',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function listings()
    {
        return $this->hasMany(SellerListing::class);
    }

    public function publishedListings()
    {
        return $this->hasMany(SellerPublishedListing::class);
    }

    public function orders()
    {
        return $this->hasMany(SellerOrder::class);
    }

    public function conversations()
    {
        return $this->hasMany(SellerConversation::class);
    }

    public function notifications()
    {
        return $this->hasMany(SellerNotification::class);
    }

    public function favorites()
    {
        return $this->hasMany(SellerFavorite::class);
    }

    public function publishAttempts()
    {
        return $this->hasMany(SellerProductPublishAttempt::class);
    }
}
