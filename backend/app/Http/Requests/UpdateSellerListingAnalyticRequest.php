<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerListingAnalyticRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'sometimes|exists:seller_published_listings,id',
            'views' => 'sometimes|integer|min:0',
            'favorites' => 'sometimes|integer|min:0',
            'offers' => 'sometimes|integer|min:0',
            'avg_offer_price' => 'sometimes|numeric|min:0',
            'best_offer_price' => 'sometimes|numeric|min:0',
            'lowest_offer_price' => 'sometimes|numeric|min:0',
            'views_trend' => 'sometimes|numeric',
            'favorites_trend' => 'sometimes|numeric',
            'created_at' => 'sometimes|date',
        ];
    }
}
