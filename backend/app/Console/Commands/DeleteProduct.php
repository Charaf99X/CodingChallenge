<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class DeleteProduct extends Command
{
    protected $signature = 'product:delete {id}';
    protected $description = 'Delete a product by ID';

    public function handle()
    {
        $id = $this->argument('id');
        $product = Product::find($id);

        if ($product) {
            
            if ($product->image) {
                File::delete(public_path('storage/' . $product->image));
            }
            $product->delete();
            $this->info('Product deleted: ' . $product->name);
        } else {
            $this->error('Product not found.');
        }
    }
}
