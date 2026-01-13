<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerSystemEvent extends Model
{
    /** @use HasFactory<\Database\Factories\SellerSystemEventFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'conversation_id',
        'event_type',
        'event_data',
        'occurred_at',
    ];

    protected $casts = [
        'event_data' => 'array',
        'occurred_at' => 'datetime',
    ];

    public function conversation()
    {
        return $this->belongsTo(SellerConversation::class, 'conversation_id');
    }
}
