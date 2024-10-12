<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Product;

class ProductService
{
    protected ProductRepository $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts(int $perPage, string $sortBy, string $sortOrder, ?int $categoryId = null): LengthAwarePaginator
    {
        return $this->productRepo->getAllWithPaginationAndSorting($perPage, $sortBy, $sortOrder, $categoryId);
    }

    public function createProduct(array $data): Product
    {
        if (isset($data['image'])) {
            if ($data['image'] instanceof \Illuminate\Http\UploadedFile) {
                $path = $data['image']->store('images', 'public');
            } else {
                $path = str_replace('storage/app/public/', '', $data['image']);
            }
            $data['image'] = $path;
        }
        
        return $this->productRepo->create($data);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepo->delete($id);
    }
}
