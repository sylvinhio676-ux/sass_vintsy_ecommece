<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'sometimes|exists:conversations,id',
            'sender_id' => 'sometimes|exists:users,id',
            'content' => 'sometimes|string',
            'created_at' => 'sometimes|date',
        ];
    }
}
