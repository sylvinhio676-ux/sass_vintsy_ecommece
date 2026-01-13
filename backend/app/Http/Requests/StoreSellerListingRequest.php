<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'listing_id' => 'required|string|max:120',
            'product_sku' => 'required|string|max:64',
            'title' => 'required|string|max:255',
            'photo_url' => 'required|string|max:500',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|string|max:30',
            'last_sync' => 'required|date',
            'error_message' => 'nullable|string|max:255',
        ];
    }
}
