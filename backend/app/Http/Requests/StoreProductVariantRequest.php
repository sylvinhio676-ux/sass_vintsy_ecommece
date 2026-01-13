<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductVariantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'title' => 'nullable|string|max:120',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'sku' => ['required|string|max:64', 'unique:product_variants,sku'],
        ];
    }
}
