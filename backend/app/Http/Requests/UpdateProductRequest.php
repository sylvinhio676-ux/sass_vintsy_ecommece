<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('product');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'shop_id' => 'sometimes|exists:shops,id',
            'category_id' => 'sometimes|exists:categories,id',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:draft,published,archived',
            'sku' => [
                'sometimes|string|max:64',
                Rule::unique('products', 'sku')->ignore($id),
            ],
        ];
    }
}
