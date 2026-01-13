<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'shop_id' => 'sometimes|exists:shops,id',
            'plan_id' => 'sometimes|exists:plans,id',
            'status' => 'sometimes|in:active,trial,canceled,past_due',
            'started_at' => 'sometimes|date',
            'ends_at' => 'nullable|date|after_or_equal:started_at',
        ];
    }
}
