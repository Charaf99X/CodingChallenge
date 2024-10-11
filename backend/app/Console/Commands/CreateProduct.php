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

        // Check if an image path is provided
        if ($imagePath) {
            // Generate a unique image name
            $imageName = time() . '_' . basename($imagePath);
            // Define the destination path
            $destinationPath = public_path('storage/images/' . $imageName);

            // Move the uploaded image to the storage
            if (File::exists($imagePath)) {
                File::move($imagePath, $destinationPath);
                $imageStoragePath = 'images/' . $imageName; // Store relative path for database
            } else {
                $this->error("Image file does not exist at the given path: $imagePath");
                return;
            }
        }

        // Create the product in the database
        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $imageStoragePath,
        ]);

        $this->info('Product created: ' . $product->name); // Use info to display the message
    }
}
