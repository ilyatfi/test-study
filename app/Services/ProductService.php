<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    public function index()
    {
        $products = Product::latest()->simplePaginate(5);

        return $products;
    }

    public function store(array $product)
    {
        $product = Product::create($product);
    }

    public function update(array $product_data, Product $product)
    {
        $product->update($product_data);
    }

    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function log(Product $product, string $action)
    {
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => $action,
            'created_at' => now()
        ]);
    }
}
