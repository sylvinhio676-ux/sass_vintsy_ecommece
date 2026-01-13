<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerFavoriteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'item_id' => 'required|string|max:120',
            'item_title' => 'required|string|max:255',
            'item_sku' => 'nullable|string|max:64',
            'item_price' => 'required|numeric|min:0',
            'item_thumbnail' => 'required|string|max:500',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'user_handle' => 'required|string|max:120',
            'user_name' => 'required|string|max:120',
            'created_at' => 'required|date',
        ];
    }
}
