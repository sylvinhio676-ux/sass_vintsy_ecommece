<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'nullable|exists:shops,id',
            'name' => 'sometimes|string|max:120',
            'username' => 'sometimes|string|max:120',
            'email' => 'sometimes|email|max:190',
            'password_hash' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:8',
            'is_connected' => 'sometimes|boolean',
            'is_running' => 'sometimes|boolean',
            'proxy_host' => 'nullable|string|max:190',
            'proxy_port' => 'nullable|string|max:20',
            'proxy_user' => 'nullable|string|max:120',
            'proxy_password' => 'nullable|string|max:120',
            'vnc_password' => 'nullable|string|max:120',
            'last_session_start' => 'nullable|date',
        ];
    }
}
