<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerPublishedListingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_id' => 'nullable|exists:seller_products,id',
            'sku' => 'sometimes|string|max:64',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category' => 'sometimes|string|max:120',
            'brand' => 'nullable|string|max:120',
            'condition_status' => 'sometimes|string|max:40',
            'material' => 'nullable|string|max:120',
            'size' => 'sometimes|string|max:80',
            'price' => 'sometimes|numeric|min:0',
            'package_size' => 'sometimes|string|max:20',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'vinted_listing_id' => 'sometimes|string|max:120',
            'vinted_url' => 'sometimes|string|max:500',
            'status' => 'sometimes|string|max:20',
            'published_date' => 'sometimes|date',
            'last_sync_date' => 'sometimes|date',
            'boost_active' => 'sometimes|boolean',
            'is_hidden' => 'sometimes|boolean',
        ];
    }
}
