<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerListingAnalyticsHistoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'sometimes|exists:seller_published_listings,id',
            'metric' => 'sometimes|in:views,favorites,offers',
            'value' => 'sometimes|integer|min:0',
            'recorded_at' => 'sometimes|date',
        ];
    }
}
