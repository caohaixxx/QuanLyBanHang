<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::select(
            'id',
            'name',
            'email',
            'phone',
        );
        if (isset($request->search)) {
            $customers->where('customers.name', 'like', '%' . $request->search . '%');
        }

        $customers = $customers->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }
}
