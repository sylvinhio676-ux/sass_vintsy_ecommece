<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerListingInsightRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'required|exists:seller_published_listings,id',
            'insight_type' => 'required|string|max:40',
            'severity' => 'required|in:info,warning,critical',
            'data_json' => 'nullable|array',
            'created_at' => 'required|date',
        ];
    }
}
