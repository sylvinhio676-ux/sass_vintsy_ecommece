<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerProductPublishAttemptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'sometimes|exists:seller_products,id',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'status' => 'sometimes|in:success,failed',
            'error_message' => 'nullable|string|max:255',
            'created_at' => 'sometimes|date',
        ];
    }
}
