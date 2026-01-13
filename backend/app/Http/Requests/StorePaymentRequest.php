<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'provider' => 'required|in:stripe,paypal',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:paid,failed,refunded',
            'created_at' => 'required|date',
        ];
    }
}
