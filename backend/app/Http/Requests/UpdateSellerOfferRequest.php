<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'sometimes|exists:seller_conversations,id',
            'sender_id' => 'sometimes|string|max:80',
            'sender_name' => 'sometimes|string|max:120',
            'sender_avatar' => 'nullable|string|max:500',
            'amount' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:sent,accepted,declined,countered,expired',
            'sent_at' => 'sometimes|date',
            'is_me' => 'sometimes|boolean',
            'message' => 'nullable|string',
            'parent_offer_id' => 'nullable|exists:seller_offers,id',
        ];
    }
}
