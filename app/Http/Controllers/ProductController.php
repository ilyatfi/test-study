<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
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
        $products = $request->validate([
            'item_name' => ['required'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'decimal:2'],
        ]);
        // Adding to database
        $product = Product::create($products);

        // Audit table
        DB::insert('insert into product_audit (user_id, product_id, action, created_at)  values (?, ?, ?, ?)', [Auth::user()->id, $product->id, 'Created', now()]);

        return redirect('/products');
    }

    public function audit(Request $request)
    {
        // Validation
        $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
        ]);

        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $audit = DB::table('product_audit')
            ->where('created_at', '>=', $startDate)
            ->where('created_at', '<=', $endDate)
            ->get();
  
        return response()->json($audit);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product)
    {
        // Validation
        request()->validate([
            'item_name' => ['required'],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'decimal:2'],
        ]);

        $product->update([
            'item_name' => request('item_name'),
            'quantity' => request('quantity'),
            'price' => request('price'),
        ]);
        
        // Audit table
        DB::insert('insert into product_audit (user_id, product_id, action, created_at)  values (?, ?, ?, ?)', [Auth::user()->id, $product->id, 'Updated', now()]);

        return redirect('/products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        // Audit table
        DB::insert('insert into product_audit (user_id, product_id, action, created_at)  values (?, ?, ?, ?)', [Auth::user()->id, $product->id, 'Deleted', now()]);

        return redirect('/products');
    }
}
