<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProductMaterial extends Model
{
    /** @use HasFactory<\Database\Factories\SellerProductMaterialFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'material',
    ];

    public function product()
    {
        return $this->belongsTo(SellerProduct::class, 'product_id');
    }
}
