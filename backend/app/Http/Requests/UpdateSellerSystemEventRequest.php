<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerSystemEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'sometimes|exists:seller_conversations,id',
            'event_type' => 'sometimes|string|max:30',
            'event_data' => 'nullable|array',
            'occurred_at' => 'sometimes|date',
        ];
    }
}
