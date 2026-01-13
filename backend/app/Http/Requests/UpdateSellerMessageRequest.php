<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'sometimes|exists:seller_conversations,id',
            'sender_id' => 'sometimes|string|max:80',
            'sender_name' => 'sometimes|string|max:120',
            'sender_avatar' => 'nullable|string|max:500',
            'content' => 'sometimes|string',
            'sent_at' => 'sometimes|date',
            'is_me' => 'sometimes|boolean',
            'image_url' => 'nullable|string|max:500',
            'original_language' => 'nullable|string|max:40',
        ];
    }
}
