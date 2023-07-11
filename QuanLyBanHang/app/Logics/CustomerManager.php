<?php

namespace App\Logics;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class CustomerManager extends Model
{
    public function getHistory($id)
    {
        $history = Order::select(
            'orders.id',
            'orders.code',
            'orders.customer_id',
            'orders.status',
            'orders.total',
            'orders.created_at',
        )->where('orders.customer_id', $id)->get();

        return $history;
    }
}
