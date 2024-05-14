<?php

namespace App\Http\Controllers;

use App\Company;
use App\CustomersOrders;
use App\Mail\OrderNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendOrderNotification($orderNo)
    {
        $user = User::find(1);
        $company = Company::find(1);
        $order = CustomersOrders::where('order_no',$orderNo)->first();
        Mail::to($user->email)->send(new OrderNotification($user,$order,$company));

        return redirect()->route('client.invoice',$order->order_no);
    }
}
