<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDisputeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'status' => 'sometimes|in:open,resolved,rejected',
            'reason' => 'sometimes|string',
            'created_at' => 'sometimes|date',
        ];
    }
}
