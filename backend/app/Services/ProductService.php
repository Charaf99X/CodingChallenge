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

    public function getAllProducts()
    {
        return $this->productRepo->all();
    }

    public function createProduct(array $data)
    {
        if (isset($data['image'])) {
            // Store the image and get the path
            $path = $data['image']->store('images', 'public');
            // Add the path to the data array
            $data['image'] = $path;
        }
        
        return $this->productRepo->create($data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepo->delete($id);
    }
}
