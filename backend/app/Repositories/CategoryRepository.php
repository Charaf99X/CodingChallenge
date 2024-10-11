<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }
}
