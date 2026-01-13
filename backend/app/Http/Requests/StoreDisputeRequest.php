<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisputeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order_id' => 'required|exists:orders,id',
            'status' => 'required|in:open,resolved,rejected',
            'reason' => 'required|string',
            'created_at' => 'required|date',
        ];
    }
}
