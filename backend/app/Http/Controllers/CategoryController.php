<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            return Category::with('parent')->paginate(20);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load categories.'], 500);
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());

            return response()->json($category->load('parent'), 201);
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to create category.'], 500);
        }
    }

    public function show(Category $category)
    {
        try {
            return $category->load('parent', 'children');
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to load category.'], 500);
        }
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());

            return $category->load('parent');
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to update category.'], 500);
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return response()->noContent();
        } catch (Throwable $e) {
            return response()->json(['message' => 'Failed to delete category.'], 500);
        }
    }
}
