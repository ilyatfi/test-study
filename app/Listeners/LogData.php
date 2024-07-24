<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LogData
{
    // public function handle(ProductUpdated $event): void
    // {
    //     $product = $event->product;

    //     // Adding to product_audit
    //     $product->logs()->create([
    //         'user_id' => Auth::user()->id,
    //         'action' => 'Updated',
    //         'created_at' => now()
    //     ]);
    // }
}
