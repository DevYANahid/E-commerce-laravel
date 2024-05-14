<?php

namespace App\Http\Controllers;

use App\Company;
use App\CustomersOrders;
use Illuminate\Http\Request;

class OrderActionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = CustomersOrders::find($id);
        $newOrderCount = CustomersOrders::where('status',1)
            ->count();
        $company = Company::find(1);
//        dd($order);
        return view('admin.single-order',compact('order','newOrderCount', 'company'));
    }

    public function updateStatus(Request $request, $orderNo)
    {
        $order = CustomersOrders::where('order_no',$orderNo)->first();
        if ($request->status == 1 || $request->status == 2 || $request->status == 0 ) {
            $order->status = $request->status;
            $order->save();
        }
        return response()->json('success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = CustomersOrders::find($id);
//        dd($order);
        $order->status = $request->status;
        $order->action_date = date('Y/m/d',time());
        $order->delivery_day = $request->delivery_time;
        $order->save();
        return back()->withMessage('Order Status in Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
