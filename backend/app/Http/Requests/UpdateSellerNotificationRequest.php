<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kind' => 'sometimes|string|max:30',
            'title' => 'sometimes|string|max:255',
            'details' => 'sometimes|string',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'created_at' => 'sometimes|date',
        ];
    }
}
