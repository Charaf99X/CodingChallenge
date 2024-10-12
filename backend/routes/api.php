<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);

Route::get('/routes', function () {
    $routes = Route::getRoutes();
    $apiRoutes = [];
    foreach ($routes as $route) {
        if (strpos($route->uri, 'api') === 0) {
            $apiRoutes[] = [
                'uri' => $route->uri,
                'methods' => $route->methods,
            ];
        }
    }
    return response()->json($apiRoutes);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
