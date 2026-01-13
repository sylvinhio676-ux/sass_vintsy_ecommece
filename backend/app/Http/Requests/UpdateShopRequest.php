<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('shop');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'owner_id' => 'sometimes|exists:users,id',
            'name' => 'sometimes|string|max:120',
            'slug' => [
                'sometimes|string|max:120',
                Rule::unique('shops', 'slug')->ignore($id),
            ],
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string|max:500',
            'banner_url' => 'nullable|string|max:500',
            'policies' => 'nullable|string',
        ];
    }
}
