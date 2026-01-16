<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Throwable;

class ShopController extends Controller
{
    public function index()
    {
        try {
            return Shop::with('owner')->paginate(20);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load shops.'], 500);
        }
    }

    public function store(StoreShopRequest $request)
    {
        try {
            $shop = Shop::create($request->validated());

            return response()->json($shop->load('owner'), 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to create shop.'], 500);
        }
    }

    public function show(Shop $shop)
    {
        try {
            return $shop->load('owner');
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load shop.'], 500);
        }
    }

    public function update(UpdateShopRequest $request, Shop $shop)
    {
        try {
            $shop->update($request->validated());

            return $shop->load('owner');
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to update shop.'], 500);
        }
    }

    public function destroy(Shop $shop)
    {
        try {
            $shop->delete();

            return response()->noContent();
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to delete shop.'], 500);
        }
    }
}
