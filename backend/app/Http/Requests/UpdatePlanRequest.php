<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('plan');
        if (is_object($id)) {
            $id = $id->id;
        }

        return [
            'name' => [
                'sometimes|string|max:50',
                Rule::unique('plans', 'name')->ignore($id),
            ],
            'product_limit' => 'nullable|integer|min:1',
            'price_monthly' => 'sometimes|numeric|min:0',
        ];
    }
}
