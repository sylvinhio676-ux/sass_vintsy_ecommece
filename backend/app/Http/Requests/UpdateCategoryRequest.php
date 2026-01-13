<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('category');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'parent_id' => 'nullable|exists:categories,id',
            'name' => 'sometimes|string|max:120',
            'slug' => [
                'sometimes|string|max:120',
                Rule::unique('categories', 'slug')->ignore($id),
            ],
        ];
    }
}
