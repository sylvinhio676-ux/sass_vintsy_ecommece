<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kind' => 'required|string|max:30',
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'created_at' => 'required|date',
        ];
    }
}
