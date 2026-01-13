<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'buyer_id' => 'required|string|max:80',
            'buyer_name' => 'required|string|max:120',
            'buyer_username' => 'required|string|max:120',
            'buyer_avatar' => 'nullable|string|max:500',
            'item_id' => 'required|string|max:120',
            'item_title' => 'required|string|max:255',
            'item_thumbnail' => 'required|string|max:500',
            'item_price' => 'required|numeric|min:0',
            'last_message' => 'required|string',
            'last_message_time' => 'required|date',
            'unread_count' => 'required|integer|min:0',
            'seller_account_id' => 'required|exists:seller_accounts,id',
            'status' => 'required|string|max:30',
            'has_label' => 'sometimes|boolean',
        ];
    }
}
