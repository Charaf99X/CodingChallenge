<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllWithPaginationAndSorting($perPage, $sortBy, $sortOrder, $categoryId = null)
    {
        $query = Product::query();

        if ($categoryId) {
            $query->whereHas('categories', function ($q) use ($categoryId) {
                $q->where('categories.id', $categoryId);
            });
        }

        return $query->orderBy($sortBy, $sortOrder)
                     ->with('categories')
                     ->paginate($perPage);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function delete($id)
    {
        return Product::destroy($id);
    }
}
