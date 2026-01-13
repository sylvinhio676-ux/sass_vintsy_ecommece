<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductPhoto extends Model
{
    /** @use HasFactory<\Database\Factories\SellerProductPhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'url',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    public function product()
    {
        return $this->belongsTo(SellerProduct::class, 'product_id');
    }
}
