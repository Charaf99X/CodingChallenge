<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
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
