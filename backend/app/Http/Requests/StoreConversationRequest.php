<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'user_id' => 'required|exists:users,id',
            'last_message' => 'nullable|string',
            'updated_at' => 'required|date',
        ];
    }
}
