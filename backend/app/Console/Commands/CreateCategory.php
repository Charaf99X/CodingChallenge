<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    protected $signature = 'category:create {name} {parent_id?}';
    protected $description = 'Create a new category';

    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $parentId = $this->argument('parent_id');

        $data = [
            'name' => $name,
            'parent_id' => $parentId,
        ];

        $category = $this->categoryService->createCategory($data);

        $this->info("Category '{$category->name}' created successfully.");
        return 0;
    }
}
