<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return response()->json($this->productService->getAllProducts());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validating image types and size
        ]);

        $product = $this->productService->createProduct($request->all());
        return response()->json($product, 201);
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return response()->json(null, 204);
    }
}
