<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    // learn:
    //
    // > LARAVEL EVENTS
    // > VS CODE SHOTCUTS/HOTKEYS
    // > JSON VIEW
    // > PaginateRequest
    // > ? Where does controller call to perform logic

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
