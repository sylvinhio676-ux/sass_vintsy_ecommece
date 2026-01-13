<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|string|max:120',
            'order_type' => 'sometimes|in:sale,purchase',
            'source' => 'nullable|in:vinted,manual',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'title' => 'sometimes|string|max:255',
            'sku' => 'nullable|string|max:64',
            'price' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|string|max:30',
            'category' => 'sometimes|string|max:30',
            'thumbnail_url' => 'sometimes|string|max:500',
            'buyer_name' => 'sometimes|string|max:120',
            'buyer_username' => 'sometimes|string|max:120',
            'seller_name' => 'nullable|string|max:120',
            'seller_username' => 'nullable|string|max:120',
            'shipping_street' => 'nullable|string|max:190',
            'shipping_city' => 'nullable|string|max:120',
            'shipping_postal_code' => 'nullable|string|max:20',
            'shipping_country' => 'nullable|string|max:80',
            'fees_item_price' => 'sometimes|numeric|min:0',
            'fees_shipping_fee' => 'sometimes|numeric|min:0',
            'fees_service_fee' => 'sometimes|numeric|min:0',
            'fees_total' => 'sometimes|numeric|min:0',
            'processed' => 'sometimes|boolean',
            'purchase_cost' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
            'tracking_number' => 'nullable|string|max:120',
            'tracking_carrier' => 'nullable|string|max:120',
            'tracking_url' => 'nullable|string|max:500',
            'is_bundle' => 'sometimes|boolean',
        ];
    }
}
