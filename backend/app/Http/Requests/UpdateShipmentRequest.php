<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'carrier' => 'nullable|string|max:120',
            'tracking_number' => 'nullable|string|max:120',
            'status' => 'sometimes|in:preparing,shipped,delivered',
            'shipped_at' => 'nullable|date',
            'delivered_at' => 'nullable|date|after_or_equal:shipped_at',
        ];
    }
}
