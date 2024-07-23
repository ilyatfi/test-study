<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validation
        $product = $request->validate([
            'item_name' => ['required'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'decimal:2'],
        ]);
        // Adding to database
        $product = Product::create($product);

        // Adding to product_audit
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => 'Created',
            'created_at' => now()
        ]);

        return redirect('/products');
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        // Validation
        $request->validate([
            'item_name' => ['required'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'decimal:2'],
        ]);

        $product->update([
            'item_name' => request('item_name'),
            'quantity' => request('quantity'),
            'price' => request('price'),
        ]);
        
        // Adding to product_audit
        $product->logs()->create([
            'user_id' => Auth::user()->id,
            'action' => 'Updated',
            'created_at' => now()
        ]);

        return redirect('/products');
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

        return redirect('/products');
    }
}
