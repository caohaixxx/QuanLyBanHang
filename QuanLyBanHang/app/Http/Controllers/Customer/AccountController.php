<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Logics\CustomerManager;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        $customer = Customer::find(Auth::guard('customer')->id());

        $customerManager = new CustomerManager();
        $histories =  $customerManager->getHistory(Auth::guard('customer')->id());

        return view('customer.account.index', compact('customer', 'histories'));
    }

    public function updateAccount(Request $request)
    {
        try{
            $customer = Customer::find(Auth::guard('customer')->id());
            DB::beginTransaction();
            if($customer){
                $params = [
                    'name' => $request->full_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                ];
                $customer->update($params);
            }
            DB::commit();
            return redirect()->route('customer.account')->with([
                'status_succeed' => trans('message.update_account_susscess'),
                'tab' => 'account'
            ]);
        }catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return redirect()->route('customer.account')->with([
                'status_failed' => trans('message.server_error'),
                'tab' => 'account'
            ]);
        }
    }

    public function changePasswword(Request $request)
    {
        try{
            $customer = Customer::find(Auth::guard('customer')->id());
            DB::beginTransaction();
            if(Hash::check($request->current_password, $customer->password)){
                $customer->update([
                    'password' => Hash::make($request->new_password)
                ]);
                DB::commit();
                return redirect()->route('customer.account', ['tab' => 'password'])->with([
                    'status_succeed' => trans('message.update_password_susscess'),
                    'tab' => 'password'
                ]);
            }else{
                return redirect()->route('customer.account', ['tab' => 'password'])->with([
                    'status_failed' => trans('message.wrong_password'),
                    'tab' => 'password'
                ]);
            }
            
        }catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return redirect()->route('customer.account', ['tab' => 'password'])->with([
                'status_failed' => trans('message.server_error'),
                'tab' => 'password'
            ]);
        }
    }

    public function history($code)
    {
        $historyDetail = Order::select(
            'orders.*',
            'tinhthanh.matp',
            'tinhthanh.name_city',
            'quanhuyen.name_quanhuyen as name_district',
            'quanhuyen.maqh',
            'xaphuong.name_xaphuong as name_ward',
            'xaphuong.xaid',
        )->leftjoin('tinhthanh', 'tinhthanh.matp', 'orders.city')
        ->leftjoin('quanhuyen', 'quanhuyen.maqh', 'orders.district')
        ->leftjoin('xaphuong', 'xaphuong.xaid', 'orders.ward')
        ->where('orders.customer_id', Auth::guard('customer')->id())
        ->where('orders.code', $code)
        ->first();

        $details = Order_Detail::select(
            'order_details.id as orderDetailId',
            'order_details.order_id',
            'order_details.product_detail_id',
            'order_details.product_name',
            'order_details.price',
            'order_details.quantity',
            'order_details.color',
            'order_details.created_at',
            'product_details.product_id',
        )->leftjoin('product_details', 'product_details.id', 'order_details.product_detail_id')
        ->where('order_details.order_id', $historyDetail->id)->get();

        return view('customer.partials.history-detail', compact('historyDetail', 'details'));
    }
}
