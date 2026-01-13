<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSellerProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'nullable|exists:shops,id',
            'sku' => ['required|string|max:64', 'unique:seller_products,sku'],
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:120',
            'brand' => 'nullable|string|max:120',
            'condition_status' => 'required|string|max:40',
            'size' => 'required|string|max:80',
            'price' => 'required|numeric|min:0',
            'purchase_cost' => 'nullable|numeric|min:0',
            'last_price' => 'nullable|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'package_size' => 'required|string|max:20',
            'status' => 'required|string|max:30',
            'internal_notes' => 'nullable|string',
        ];
    }
}
