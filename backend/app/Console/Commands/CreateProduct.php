<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class CreateProduct extends Command
{
    protected $signature = 'product:create {name} {description} {price} {image?}';
    protected $description = 'Create a new product';

    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->argument('description');
        $price = $this->argument('price');
        $imagePath = $this->argument('image');

        $imageStoragePath = null;

        if ($imagePath) {
            $imageName = time() . '_' . basename($imagePath);
            $destinationPath = public_path('storage/images/' . $imageName);

            if (File::exists($imagePath)) {
                File::move($imagePath, $destinationPath);
                $imageStoragePath = 'images/' . $imageName;
            } else {
                $this->error("Image file does not exist at the given path: $imagePath");
                return;
            }
        }

        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $imageStoragePath,
        ]);

        $this->info('Product created: ' . $product->name);
    }
}
