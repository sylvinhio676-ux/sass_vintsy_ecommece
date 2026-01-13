<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSellerListingAnalyticRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'required|exists:seller_published_listings,id',
            'views' => 'required|integer|min:0',
            'favorites' => 'required|integer|min:0',
            'offers' => 'required|integer|min:0',
            'avg_offer_price' => 'required|numeric|min:0',
            'best_offer_price' => 'required|numeric|min:0',
            'lowest_offer_price' => 'required|numeric|min:0',
            'views_trend' => 'required|numeric',
            'favorites_trend' => 'required|numeric',
            'created_at' => 'required|date',
        ];
    }
}
