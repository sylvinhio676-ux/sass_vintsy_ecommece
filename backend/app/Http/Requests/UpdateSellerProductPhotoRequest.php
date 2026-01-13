<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerProductPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'sometimes|exists:seller_products,id',
            'url' => 'sometimes|string|max:500',
            'position' => 'nullable|integer|min:0',
        ];
    }
}
