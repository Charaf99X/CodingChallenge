<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'parent_id' => null],
            ['name' => 'Computers', 'parent_id' => 1],
            ['name' => 'Smartphones', 'parent_id' => 1],
            ['name' => 'Clothing', 'parent_id' => null],
            ['name' => 'Men\'s Clothing', 'parent_id' => 4],
            ['name' => 'Women\'s Clothing', 'parent_id' => 4],
            ['name' => 'Books', 'parent_id' => null],
            ['name' => 'Fiction', 'parent_id' => 7],
            ['name' => 'Non-Fiction', 'parent_id' => 7],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}