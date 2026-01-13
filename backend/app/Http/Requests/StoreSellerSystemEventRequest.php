<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerSystemEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'required|exists:seller_conversations,id',
            'event_type' => 'required|string|max:30',
            'event_data' => 'nullable|array',
            'occurred_at' => 'required|date',
        ];
    }
}
