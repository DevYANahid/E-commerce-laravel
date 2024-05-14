<?php

namespace App\Http\Controllers;

use App\CustomersOrders;
use App\OrderedProduct;
use App\OrderedProductAttribute;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CustomersOrdersController extends Controller
{
    public function storeOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|min:11|max:14',
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'paymentMethod' => 'required',
            'order_time' => 'required',
        ]);
//        dd($request);

        if ($request->has('email')) {
            $this->validate($request, [
                'email' => 'email',
            ]);
        }

        if ($request->paymentMethod == 'bKash') {
            $this->validate($request, [
                'payment_phone' => 'required'
            ]);
        }

        if ($request->paymentMethod == 'নগদ') {
            $this->validate($request, [
                'payment_phone' => 'required',
            ]);
        }

        if ($request->paymentMethod == 'Roket') {
            $this->validate($request, [
                'payment_phone' => 'required',
            ]);
        }

        $x = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $x = str_shuffle($x);
        $x = substr($x, 0, 3);
        $x = substr(time(), 3, 3) . $x;
        $orderNo = str_shuffle($x);

        $carts = Cart::content();
        $cartSubtotal = Cart::subtotal();
        $cartTax = Cart::tax();
        $cartNet = Cart::total();

        $orderInfo = [
            'order_no' => $orderNo,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line1' => $request->address,
            'address_line2' => $request->address_line2,
            'country' => $request->country,
            'city' => $request->city,
            'zip' => $request->zip,
            'payment_type' => $request->paymentMethod,
            'payment_phone' => $request->payment_phone,
            'payment_ref' => $request->trxid,
            'subtotal' => str_replace(',','',$cartSubtotal),
            'tax' =>  str_replace(',','',$cartTax),
            'net_price' => str_replace(',','',$cartNet),
            'order_time' => $request->order_time,
            'order_date' => date('Y/m/d', time()),
        ];

//        dd($orderInfo);
        $orderID = CustomersOrders::create($orderInfo)->id;

        foreach ($carts as $cart) {
            $orderedProduct = [
            'customers_orders_id' => $orderID,
                'name' => $cart->name,
                'qty' => $cart->qty,
                'image' => $cart->options->image,
                'price' => $cart->price,
            ];
            $orderedProductId = OrderedProduct::create($orderedProduct)->id;

            $orderedProductsAttribute = [
                'ordered_product_id' => $orderedProductId,
                'color_code' =>  $cart->options->color_code,
                'color_name' =>  $cart->options->color_name,
                'size' =>  $cart->options->size,
            ];
            OrderedProductAttribute::insert($orderedProductsAttribute);
        }
        Cart::destroy();
        $order = $order = CustomersOrders::find($orderID);
        return redirect()->route('mail.order-notification',$order->order_no);
    }
}
