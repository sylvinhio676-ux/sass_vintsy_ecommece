<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerConversation extends Model
{
    /** @use HasFactory<\Database\Factories\SellerConversationFactory> */
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'buyer_name',
        'buyer_username',
        'buyer_avatar',
        'item_id',
        'item_title',
        'item_thumbnail',
        'item_price',
        'last_message',
        'last_message_time',
        'unread_count',
        'seller_account_id',
        'status',
        'has_label',
    ];

    protected $casts = [
        'item_price' => 'decimal:2',
        'last_message_time' => 'datetime',
        'unread_count' => 'integer',
        'has_label' => 'boolean',
    ];

    public function sellerAccount()
    {
        return $this->belongsTo(SellerAccount::class, 'seller_account_id');
    }

    public function messages()
    {
        return $this->hasMany(SellerMessage::class, 'conversation_id');
    }

    public function offers()
    {
        return $this->hasMany(SellerOffer::class, 'conversation_id');
    }

    public function systemEvents()
    {
        return $this->hasMany(SellerSystemEvent::class, 'conversation_id');
    }
}
