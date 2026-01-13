<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerFavoriteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'item_id' => 'sometimes|string|max:120',
            'item_title' => 'sometimes|string|max:255',
            'item_sku' => 'nullable|string|max:64',
            'item_price' => 'sometimes|numeric|min:0',
            'item_thumbnail' => 'sometimes|string|max:500',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'user_handle' => 'sometimes|string|max:120',
            'user_name' => 'sometimes|string|max:120',
            'created_at' => 'sometimes|date',
        ];
    }
}
