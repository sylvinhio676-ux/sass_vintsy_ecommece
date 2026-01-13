<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'required|exists:shops,id',
            'plan_id' => 'required|exists:plans,id',
            'status' => 'required|in:active,trial,canceled,past_due',
            'started_at' => 'required|date',
            'ends_at' => 'nullable|date|after_or_equal:started_at',
        ];
    }
}
