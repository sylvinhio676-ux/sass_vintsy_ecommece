<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('page');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'title' => 'sometimes|string|max:120',
            'slug' => [
                'sometimes|string|max:120',
                Rule::unique('pages', 'slug')->ignore($id),
            ],
            'content' => 'sometimes|string',
            'updated_at' => 'sometimes|date',
        ];
    }
}
