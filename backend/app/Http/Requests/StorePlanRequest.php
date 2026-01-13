<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required|string|max:50', 'unique:plans,name'],
            'product_limit' => 'nullable|integer|min:1',
            'price_monthly' => 'required|numeric|min:0',
        ];
    }
}
