<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use http\Message;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories,
            'status' => 'success',
        ]);
    }

    public function store(CategoryRequest $request) {
        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'category' => $category,
            'status' => 'success',
        ]);
    }

    public function update(CategoryRequest $request, Category $category) {
        $category->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json([
            'category' => $category,
            'status' => 'success',
        ]);
    }

    public function destroy(Category $category) {
        $category->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
