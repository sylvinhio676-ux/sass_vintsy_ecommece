<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerProductPublishAttemptRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:seller_products,id',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'status' => 'required|in:success,failed',
            'error_message' => 'nullable|string|max:255',
            'created_at' => 'required|date',
        ];
    }
}
