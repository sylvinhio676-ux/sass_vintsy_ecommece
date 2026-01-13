<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShopRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'owner_id' => 'required|exists:users,id',
            'name' => 'required|string|max:120',
            'slug' => ['required|string|max:120', 'unique:shops,slug'],
            'description' => 'nullable|string',
            'logo_url' => 'nullable|string|max:500',
            'banner_url' => 'nullable|string|max:500',
            'policies' => 'nullable|string',
        ];
    }
}
