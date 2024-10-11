<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop XYZ',
                'description' => 'High-performance laptop with 16GB RAM and 512GB SSD',
                'price' => 999.99,
                'image' => 'images/laptop.jpg',
                'categories' => [1, 2], // Electronics, Computers
            ],
            [
                'name' => 'Smartphone ABC',
                'description' => 'Latest smartphone with 5G capabilities',
                'price' => 699.99,
                'image' => 'images/laptop.jpg',
                'categories' => [1, 3], // Electronics, Smartphones
            ],
            [
                'name' => 'Men\'s T-Shirt',
                'description' => 'Comfortable cotton t-shirt for men',
                'price' => 19.99,
                'image' => 'images/laptop.jpg',
                'categories' => [4, 5], // Clothing, Men's Clothing
            ],
            [
                'name' => 'Women\'s Dress',
                'description' => 'Elegant summer dress for women',
                'price' => 49.99,
                'image' => 'images/laptop.jpg',
                'categories' => [4, 6], // Clothing, Women's Clothing
            ],
            [
                'name' => 'Science Fiction Novel',
                'description' => 'Bestselling sci-fi novel set in the future',
                'price' => 14.99,
                'image' => 'images/laptop.jpg',
                'categories' => [7, 8], // Books, Fiction
            ],
            [
                'name' => 'History Book',
                'description' => 'Comprehensive history of the 20th century',
                'price' => 24.99,
                'image' => 'images/laptop.jpg',
                'categories' => [7, 9], // Books, Non-Fiction
            ],
        ];

        foreach ($products as $productData) {
            $categories = $productData['categories'];
            unset($productData['categories']);

            $product = Product::create($productData);
            $product->categories()->attach($categories);
        }
    }
}