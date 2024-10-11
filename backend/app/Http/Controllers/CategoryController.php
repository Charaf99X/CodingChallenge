<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $category = $this->categoryService->createCategory($request->all());
        return response()->json($category, 201);
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->json(null, 204);
    }
}
