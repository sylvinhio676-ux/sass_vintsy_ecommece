<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'sometimes|exists:shops,id',
            'user_id' => 'sometimes|exists:users,id',
            'last_message' => 'nullable|string',
            'updated_at' => 'sometimes|date',
        ];
    }
}
