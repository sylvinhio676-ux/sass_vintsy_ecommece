<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerOrderTimelineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:seller_orders,id',
            'status' => 'required|string|max:80',
            'icon' => 'nullable|string|max:40',
            'occurred_at' => 'required|date',
        ];
    }
}
