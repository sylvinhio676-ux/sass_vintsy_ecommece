<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSellerProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('seller_product');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'shop_id' => 'nullable|exists:shops,id',
            'sku' => [
                'sometimes|string|max:64',
                Rule::unique('seller_products', 'sku')->ignore($id),
            ],
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category' => 'sometimes|string|max:120',
            'brand' => 'nullable|string|max:120',
            'condition_status' => 'sometimes|string|max:40',
            'size' => 'sometimes|string|max:80',
            'price' => 'sometimes|numeric|min:0',
            'purchase_cost' => 'nullable|numeric|min:0',
            'last_price' => 'nullable|numeric|min:0',
            'quantity' => 'sometimes|integer|min:1',
            'package_size' => 'sometimes|string|max:20',
            'status' => 'sometimes|string|max:30',
            'internal_notes' => 'nullable|string',
        ];
    }
}
