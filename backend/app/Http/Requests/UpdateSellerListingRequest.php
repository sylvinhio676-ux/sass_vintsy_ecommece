<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'listing_id' => 'sometimes|string|max:120',
            'product_sku' => 'sometimes|string|max:64',
            'title' => 'sometimes|string|max:255',
            'photo_url' => 'sometimes|string|max:500',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'price' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|max:30',
            'last_sync' => 'sometimes|date',
            'error_message' => 'nullable|string|max:255',
        ];
    }
}
