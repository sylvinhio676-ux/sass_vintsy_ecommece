<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerConversationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'buyer_id' => 'sometimes|string|max:80',
            'buyer_name' => 'sometimes|string|max:120',
            'buyer_username' => 'sometimes|string|max:120',
            'buyer_avatar' => 'nullable|string|max:500',
            'item_id' => 'sometimes|string|max:120',
            'item_title' => 'sometimes|string|max:255',
            'item_thumbnail' => 'sometimes|string|max:500',
            'item_price' => 'sometimes|numeric|min:0',
            'last_message' => 'sometimes|string',
            'last_message_time' => 'sometimes|date',
            'unread_count' => 'sometimes|integer|min:0',
            'seller_account_id' => 'sometimes|exists:seller_accounts,id',
            'status' => 'sometimes|string|max:30',
            'has_label' => 'sometimes|boolean',
        ];
    }
}
