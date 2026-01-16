<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Throwable;

class ProductController extends Controller
{
    public function index()
    {
        try {
            return Product::with(['shop', 'category', 'images', 'variants'])
                ->paginate(20);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load products.'], 500);
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());

            return response()->json($product->load(['shop', 'category', 'images', 'variants']), 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to create product.'], 500);
        }
    }

    public function show(Product $product)
    {
        try {
            return $product->load(['shop', 'category', 'images', 'variants', 'attributeValues']);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load product.'], 500);
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $product->update($request->validated());

            return $product->load(['shop', 'category', 'images', 'variants']);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to update product.'], 500);
        }
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return response()->noContent();
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to delete product.'], 500);
        }
    }
}
