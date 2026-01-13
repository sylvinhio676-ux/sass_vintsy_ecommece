<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cart_id' => 'sometimes|exists:carts,id',
            'product_id' => 'sometimes|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',
            'quantity' => 'sometimes|integer|min:1',
        ];
    }
}
