<?php

namespace Tests\Unit;

use App\Models\Product;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class TotalPriceWithVatTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $product = Product::factory()->create();
        
        $quantity = (float) $product->quantity;
        $price = (float) $product->price;
        $vat = (float) config('app.VAT');

        $totalPriceWithVat = $quantity*$price*(1+$vat);
        
        $this->assertTrue($product->totalPriceWithVat() == $totalPriceWithVat);
    }
}
