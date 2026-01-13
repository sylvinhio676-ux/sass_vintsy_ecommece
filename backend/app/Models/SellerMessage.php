<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerMessage extends Model
{
    /** @use HasFactory<\Database\Factories\SellerMessageFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'sender_name',
        'sender_avatar',
        'content',
        'sent_at',
        'is_me',
        'image_url',
        'original_language',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'is_me' => 'boolean',
    ];

    public function conversation()
    {
        return $this->belongsTo(SellerConversation::class, 'conversation_id');
    }
}
