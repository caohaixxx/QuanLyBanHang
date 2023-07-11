<?php

namespace App\Listeners;

use App\Event\ProductView;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductViewLis
{
    public function __construct()  { }

    public function handle(ProductView $event)
    {
        $event->product->increment('view_count');
    }
}
