<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerOffer extends Model
{
    /** @use HasFactory<\Database\Factories\SellerOfferFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'sender_name',
        'sender_avatar',
        'amount',
        'status',
        'sent_at',
        'is_me',
        'message',
        'parent_offer_id',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'sent_at' => 'datetime',
        'is_me' => 'boolean',
    ];

    public function conversation()
    {
        return $this->belongsTo(SellerConversation::class, 'conversation_id');
    }

    public function parentOffer()
    {
        return $this->belongsTo(SellerOffer::class, 'parent_offer_id');
    }
}
