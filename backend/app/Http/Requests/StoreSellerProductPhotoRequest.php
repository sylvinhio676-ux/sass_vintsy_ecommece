<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerProductPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:seller_products,id',
            'url' => 'required|string|max:500',
            'position' => 'nullable|integer|min:0',
        ];
    }
}
