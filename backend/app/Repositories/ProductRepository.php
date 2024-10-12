<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository
{
    public function getAllWithPaginationAndSorting(int $perPage, string $sortBy, string $sortOrder, ?int $categoryId = null): LengthAwarePaginator
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

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id) > 0;
    }
}
