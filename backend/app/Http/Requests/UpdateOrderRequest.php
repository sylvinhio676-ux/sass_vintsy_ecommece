<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'status' => 'sometimes|in:pending,paid,shipped,delivered,canceled',
            'total' => 'sometimes|numeric|min:0',
        ];
    }
}
