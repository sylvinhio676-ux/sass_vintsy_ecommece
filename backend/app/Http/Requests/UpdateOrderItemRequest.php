<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'shop_id' => 'sometimes|exists:shops,id',
            'product_id' => 'sometimes|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',
            'price' => 'sometimes|numeric|min:0',
            'quantity' => 'sometimes|integer|min:1',
        ];
    }
}
