<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductColor extends Model
{
    /** @use HasFactory<\Database\Factories\SellerProductColorFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'color',
    ];

    public function product()
    {
        return $this->belongsTo(SellerProduct::class, 'product_id');
    }
}
