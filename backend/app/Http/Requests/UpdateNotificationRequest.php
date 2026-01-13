<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'sometimes|exists:users,id',
            'type' => 'sometimes|string|max:50',
            'data_json' => 'sometimes|array',
            'created_at' => 'sometimes|date',
        ];
    }
}
