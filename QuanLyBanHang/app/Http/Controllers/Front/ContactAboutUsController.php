<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ContactAboutUsController extends Controller
{
    public function contact()
    {
        return view('partials.contact-us');
    }

    public function about()
    {
        $countOrderSus = Order::where('status', '3')->count();
        $countCustomer = Customer::count();
        $countProdut = Product::count();
        return view('partials.about-us', compact('countOrderSus','countCustomer', 'countProdut'));
    }
}
