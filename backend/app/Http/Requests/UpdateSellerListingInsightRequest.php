<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerListingInsightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'sometimes|exists:seller_published_listings,id',
            'insight_type' => 'sometimes|string|max:40',
            'severity' => 'sometimes|in:info,warning,critical',
            'data_json' => 'nullable|array',
            'created_at' => 'sometimes|date',
        ];
    }
}
