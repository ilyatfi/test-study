<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function totalPriceWithVat()
    {        
        $quantity = (float) $this->quantity;
        $price = (float) $this->price;
        $vat = (float) config('app.VAT');

        $totalPriceWithVat = $quantity*$price*(1+$vat);

        return $totalPriceWithVat;
    }
    
    public function logs(): HasMany
    {
        return $this->hasMany(Log::class);
    }
}
