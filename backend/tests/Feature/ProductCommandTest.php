<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\Product;

class ProductCommandTest extends TestCase
{
    use RefreshDatabase; // Use this to reset the database for each test

    protected function setUp(): void
    {
        parent::setUp();

        // Create a storage disk for testing
        Storage::fake('public');
    }

    public function testCreateProduct()
    {
        // Mock an image file
        $imagePath = 'storage/app/public/images/laptop.jpg';
        Storage::put($imagePath, 'image content'); // Fake putting an image

        // Run the artisan command to create a product
        $this->artisan('product:create "Test Product" "Test Description" 29.99 "' . storage_path('app/public/' . $imagePath) . '"')
             ->expectsOutput('Product created: Test Product')
             ->assertExitCode(0);

        // Assert that the product was created in the database
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 29.99,
            'image' => 'images/laptop.jpg', // Ensure the image path is correct
        ]);
    }

    public function testDeleteProduct()
    {
        // Create a product in the database
        $product = Product::create([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 29.99,
            'image' => 'images/laptop.jpg',
        ]);

        // Run the artisan command to delete the product
        $this->artisan('product:delete ' . $product->id)
             ->expectsOutput('Product deleted: Test Product')
             ->assertExitCode(0);

        // Assert that the product was deleted from the database
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
