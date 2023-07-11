<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $countProdut = Product::count();
            $countCustomer = Customer::count();
            $countOrder = Order::count();
            $countOrderPen = Order::where('status', '1')->count();
            $countOrderDeli = Order::where('status', '2')->count();
            $countOrderSus = Order::where('status', '3')->count();
            $countOrderCancel = Order::where('status', '4')->count();
            $proView = Product::select('id','name', 'view_count')->orderBy('view_count', 'DESC')->take(5)->get();

            $proRate = Product::select(
                'products.*',
                DB::raw('AVG(product_comment.rating) as rating'),
            )->leftjoin('product_comment', 'products.id', 'product_comment.product_id')->orderBy('rating', 'DESC')->take(5)->get();
            
            return view('admin.partials.dashboard', compact(
                'countProdut', 
                'countOrder', 
                'countCustomer', 
                'countOrder', 
                'countOrderSus', 
                'countOrderCancel', 
                'proView',
                'proRate',
                'countOrderPen',
                'countOrderDeli'
            ));
        }
    }

    public function fillter(Request $request)
    {
        $data = $request->all();
        $from = Carbon::createFromFormat('d/m/Y', $data['from'])->format('Y-m-d');
        $to = Carbon::createFromFormat('d/m/Y', $data['to'])->format('Y-m-d');
        $get = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total'),
        )->where('status', 3)->whereBetween('orders.created_at', [$from, $to])->groupBy(DB::raw('DATE(created_at)'))->get();

        $totalOd = Order::select(DB::raw('DATE(created_at) as dateOd'), DB::raw('COUNT(id) as qty'))->whereBetween('orders.created_at', [$from, $to])->groupBy(DB::raw('DATE(created_at)'))->get();

        $chartData = [];
        $chartDataOd = [];
        foreach ($get as $value) {
            $chartData[$value->date] = $value->total;
        }
        foreach($totalOd as $item ){
            $chartDataOd[$item->dateOd] = $item->qty;
        }

        $startDate1 = Carbon::parse($data['from']);
        $endDate1 = Carbon::parse($data['to']);
        $arrDate = [];
        $arrOder = [];
        $arrTotal = [];
        do {
            $index = $startDate1->format('Y-m-d');
            $arrDate[] = $index;
            $arrOder[] = isset($chartDataOd[$index])?$chartDataOd[$index]:0;
            $arrTotal[] = isset($chartData[$index])?$chartData[$index]:0;
        } while ($startDate1->add(1, 'day')->lte($endDate1));
        return response()->json(['order' => $arrOder, 'date' => $arrDate, 'total' => $arrTotal ]);
    }

    public function fillterWeek()
    {
        $to = Carbon::now()->format('Y-m-d');
        $from = Carbon::now()->subDays(7)->format('Y-m-d');
        $get = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total'),
        )->where('status', 3)->whereBetween('orders.created_at', [$from, $to])->groupBy(DB::raw('DATE(created_at)'))->get();

        $totalOd = Order::select(DB::raw('DATE(created_at) as dateOd'), DB::raw('COUNT(id) as qty'))->whereBetween('orders.created_at', [$from, $to])->groupBy(DB::raw('DATE(created_at)'))->get();

        $chartData = [];
        $chartDataOd = [];
        foreach ($get as $value) {
            $chartData[$value->date] = $value->total;
        }
        foreach($totalOd as $item ){
            $chartDataOd[$item->dateOd] = $item->qty;
        }

        $startDate1 = Carbon::parse($from);
        $endDate1 = Carbon::parse($to);
        $arrDate = [];
        $arrOder = [];
        $arrTotal = [];
        do {
            $index = $startDate1->format('Y-m-d');
            $arrDate[] = $index;
            $arrOder[] = isset($chartDataOd[$index])?$chartDataOd[$index]:0;
            $arrTotal[] = isset($chartData[$index])?$chartData[$index]:0;
        } while ($startDate1->add(1, 'day')->lte($endDate1));
        return response()->json(['order' => $arrOder, 'date' => $arrDate, 'total' => $arrTotal ]);
    }

    public function auth()
    {
        return view('admin.partials.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.index');
        } else {
            return back()->withErrors([
                'error' => (['message' => 'Tài khoản hoặc mật khẩu không đúng']),
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth');
    }
}
