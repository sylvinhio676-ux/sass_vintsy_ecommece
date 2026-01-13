<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerOrderTimelineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:seller_orders,id',
            'status' => 'sometimes|string|max:80',
            'icon' => 'nullable|string|max:40',
            'occurred_at' => 'sometimes|date',
        ];
    }
}
