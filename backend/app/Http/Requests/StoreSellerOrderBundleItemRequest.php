<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerOrderBundleItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:seller_orders,id',
            'title' => 'required|string|max:255',
            'sku' => 'nullable|string|max:64',
            'thumbnail_url' => 'required|string|max:500',
        ];
    }
}
