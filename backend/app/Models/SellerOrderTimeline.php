<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerOrderTimeline extends Model
{
    /** @use HasFactory<\Database\Factories\SellerOrderTimelineFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'status',
        'icon',
        'occurred_at',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
    ];

    public function order()
    {
        return $this->belongsTo(SellerOrder::class, 'order_id');
    }
}
