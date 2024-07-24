<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function store(array $product)
    {
        // Adding to database
        $product = Product::create($product);

        // Adding to product_audit
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => 'Created',
            'created_at' => now()
        ]);
    }

    public function update(array $product_data, Product $product)
    {
        $product->update($product_data);
        
        // Adding to product_audit
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => 'Updated',
            'created_at' => now()
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        // Adding to product_audit
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => 'Deleted',
            'created_at' => now()
        ]);
    }
}
