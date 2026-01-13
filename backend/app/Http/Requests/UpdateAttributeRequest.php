<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAttributeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('attribute');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'name' => [
                'sometimes|string|max:120',
                Rule::unique('attributes', 'name')->ignore($id),
            ],
        ];
    }
}
