<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductVariantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('productvariant');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'product_id' => 'sometimes|exists:products,id',
            'title' => 'nullable|string|max:120',
            'price' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'sku' => [
                'sometimes|string|max:64',
                Rule::unique('product_variants', 'sku')->ignore($id),
            ],
        ];
    }
}
