<?php

namespace App\Http\Controllers\Customer;

use App\Event\SendMailRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;

class CustomerController extends Controller
{
    protected $customers;
    public function __construct(Customer $customers)
    {
        $this->customers = $customers;
    }

    public function auth()
    {
        return view('customer.partials.login');
    }

    public function login(CustomerLoginRequest $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('customer')->attempt($data)) {
            if($request->redirectTo){
                if($request->redirectTo == route('customer.auth')){
                    return redirect()->route('home')->with([
                        'status_succeed' => trans('message.login_susscess'),
                    ]);
                }
                return redirect($request->redirectTo)->with([
                    'status_succeed' => trans('message.login_susscess'),
                ]);
            }
            return redirect()->route('home')->with([
                'status_succeed' => trans('message.login_susscess'),
            ]);
        }else{
            return back()->withErrors([
                'error' => (['message' => 'Tài khoản hoặc mật khẩu không đúng']),
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.auth');
    }

    public function viewRegister()
    {
        return view('customer.partials.register');
    }

    public function register(CustomerRegisterRequest $request)
    {
        try{
            DB::beginTransaction();
            $param = [
                'name' => $request->cusname,
                'email' => $request->cusemail,
                'phone' => $request->cusphone,
                'password' => Hash::make($request->cuspassword)
            ];
            $customer = $this->customers->create($param);
            Event::dispatch(new SendMailRegister($customer));

            DB::commit();
            return redirect()->route('customer.auth')->with([
                'status_succeed' => trans('message.create_customer_successd')
            ]);
        }catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' ---Line: ' . $exception->getLine());
            return back()->with([
                'status_failed' => trans('message.create_customer_failed')
            ]);
        }
    }
    public function registersucces()
    {
        return view('customer.partials.registersucces');
    }

}
