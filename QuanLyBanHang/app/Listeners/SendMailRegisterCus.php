<?php

namespace App\Listeners;

use App\Event\SendMailRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailRegisterCus implements ShouldQueue
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
     * @param  \App\Event\SendMailRegister  $event
     * @return void
     */
    public function handle(SendMailRegister $event)
    {
        $customer = $event->register;
        Mail::send('email.register', compact('customer'), function($email) use($customer){
            $email->subject('Shop Urdan - Đăng ký tài khoản thành công');
            $email->to($customer->email, $customer->name);
        });
    }
}
