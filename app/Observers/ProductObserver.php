<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function created(Product $product): void
    {
        $this->productService->log($product, 'Created');
    }

    public function updated(Product $product): void
    {
        $this->productService->log($product, 'Updated');
    }

    public function deleted(Product $product): void
    {
        $this->productService->log($product, 'Deleted');
    }
}
