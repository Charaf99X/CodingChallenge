<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts($perPage, $sortBy, $sortOrder, $categoryId = null)
    {
        return $this->productRepo->getAllWithPaginationAndSorting($perPage, $sortBy, $sortOrder, $categoryId);
    }

    public function createProduct(array $data)
    {
        if (isset($data['image'])) {
            $path = $data['image']->store('images', 'public');
            $data['image'] = $path;
        }
        
        return $this->productRepo->create($data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepo->delete($id);
    }
}
