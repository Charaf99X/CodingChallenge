<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {id}';
    protected $description = 'Delete a product by ID';

    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle(): int
    {
        $id = $this->argument('id');

        if ($this->productService->deleteProduct($id)) {
            $this->info("Product with ID {$id} deleted successfully.");
            return 0;
        } else {
            $this->error("Failed to delete product with ID {$id}.");
            return 1;
        }
    }
}
