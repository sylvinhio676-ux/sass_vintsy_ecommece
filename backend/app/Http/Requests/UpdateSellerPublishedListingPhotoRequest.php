<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSellerPublishedListingPhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'published_listing_id' => 'sometimes|exists:seller_published_listings,id',
            'url' => 'sometimes|string|max:500',
            'position' => 'nullable|integer|min:0',
        ];
    }
}
