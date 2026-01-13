<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerOrderBundleItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:seller_orders,id',
            'title' => 'sometimes|string|max:255',
            'sku' => 'nullable|string|max:64',
            'thumbnail_url' => 'sometimes|string|max:500',
        ];
    }
}
