<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerListingAnalyticsHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'required|exists:seller_published_listings,id',
            'metric' => 'required|in:views,favorites,offers',
            'value' => 'required|integer|min:0',
            'recorded_at' => 'required|date',
        ];
    }
}
