<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'conversation_id' => 'required|exists:seller_conversations,id',
            'sender_id' => 'required|string|max:80',
            'sender_name' => 'required|string|max:120',
            'sender_avatar' => 'nullable|string|max:500',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:sent,accepted,declined,countered,expired',
            'sent_at' => 'required|date',
            'is_me' => 'sometimes|boolean',
            'message' => 'nullable|string',
            'parent_offer_id' => 'nullable|exists:seller_offers,id',
        ];
    }
}
