<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerPublishedListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'nullable|exists:seller_products,id',
            'sku' => 'required|string|max:64',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:120',
            'brand' => 'nullable|string|max:120',
            'condition_status' => 'required|string|max:40',
            'material' => 'nullable|string|max:120',
            'size' => 'required|string|max:80',
            'price' => 'required|numeric|min:0',
            'package_size' => 'required|string|max:20',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'vinted_listing_id' => 'required|string|max:120',
            'vinted_url' => 'required|string|max:500',
            'status' => 'required|string|max:20',
            'published_date' => 'required|date',
            'last_sync_date' => 'required|date',
            'boost_active' => 'sometimes|boolean',
            'is_hidden' => 'sometimes|boolean',
        ];
    }
}
