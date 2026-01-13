<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'required|exists:seller_conversations,id',
            'sender_id' => 'required|string|max:80',
            'sender_name' => 'required|string|max:120',
            'sender_avatar' => 'nullable|string|max:500',
            'content' => 'required|string',
            'sent_at' => 'required|date',
            'is_me' => 'sometimes|boolean',
            'image_url' => 'nullable|string|max:500',
            'original_language' => 'nullable|string|max:40',
        ];
    }
}
