<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Category;

class CategoryService
{
    protected CategoryRepository $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategories(): Collection
    {
        return $this->categoryRepo->all();
    }

    public function createCategory(array $data): Category
    {
        return $this->categoryRepo->create($data);
    }

    public function deleteCategory(int $id): bool
    {
        return $this->categoryRepo->delete($id);
    }
}
