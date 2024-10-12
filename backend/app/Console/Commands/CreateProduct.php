<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ProductService;
use Illuminate\Support\Facades\File;

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {description} {price} {image?}';
    protected $description = 'Create a new product';

    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    public function handle(): int
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');
        $imagePath = $this->argument('image');

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ];

        if ($imagePath && file_exists($imagePath)) {
            $data['image'] = new \Illuminate\Http\UploadedFile($imagePath, basename($imagePath));
        } else if ($imagePath) {
            $this->error("Image file does not exist at the given path: $imagePath");
            return 1;
        }

        $product = $this->productService->createProduct($data);

        $this->info('Product created: ' . $product->name);
        return 0;
    }
}
