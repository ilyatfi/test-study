<?php

namespace App\Models;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $dispatchesEvents = [
        'created' => ProductCreated::class,
        'updated' => ProductUpdated::class,
        'deleted' => ProductDeleted::class,
    ];

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
