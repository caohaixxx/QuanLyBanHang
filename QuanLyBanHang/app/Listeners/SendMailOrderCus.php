<?php

namespace App\Listeners;

use App\Event\SendMailOrder;
use App\Models\Customer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailOrderCus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Event\SendMailOrder  $event
     * @return void
     */
    public function handle(SendMailOrder $event)
    {
        $customer = Customer::find($event->order->customer_id);
        Mail::send('email.register', compact('customer'), function($email) use($customer){
            $email->subject('Shop Urdan - Đăng ký tài khoản thành công');
            $email->to($customer->email, $customer->name);
        });
    }
}
