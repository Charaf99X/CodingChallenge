<?php

namespace App\Console\Commands;

use App\Services\CategoryService;
use Illuminate\Console\Command;

class DeleteCategory extends Command
{
    protected $signature = 'category:delete {id}';
    protected $description = 'Delete a category';

    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    public function handle(): int
    {
        $id = $this->argument('id');

        $result = $this->categoryService->deleteCategory($id);

        if ($result) {
            $this->info("Category with ID {$id} deleted successfully.");
            return 0;
        } else {
            $this->error("Failed to delete category with ID {$id}.");
            return 1;
        }
    }
}
