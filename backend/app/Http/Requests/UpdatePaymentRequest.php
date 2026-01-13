<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'sometimes|exists:orders,id',
            'provider' => 'sometimes|in:stripe,paypal',
            'amount' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:paid,failed,refunded',
            'created_at' => 'sometimes|date',
        ];
    }
}
