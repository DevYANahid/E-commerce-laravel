<?php

namespace App\Http\Controllers;

use App\CustomerSupport;
use Illuminate\Http\Request;

class CustomerSupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function modifyCustomerSupport(Request $request)
    {
        $this->validate($request,[
            'email' => ['required', 'string', 'email'],
        ]);
        if ($request->has('phone1')){
            $this->validate($request,[
                'phone1' => ['required', 'string', 'min:11', 'max:14'],
            ]);
        }
        if ($request->has('phone2')){
            if ($request->phone2 != null){
                $this->validate($request,[
                    'phone2' => ['required', 'string', 'min:11', 'max:14'],
                ]);
            }
        }

        $customerSupport = CustomerSupport::all();
        if (count($customerSupport) < 1)
        {
            $info = new CustomerSupport();
            $info->email = $request->email;
            $info->phone1 = $request->phone1;
            $info->phone2 = $request->phone2;
            $info->save();
        }else{
            $info = CustomerSupport::find(1);
            $info->email = $request->email;
            $info->phone1 = $request->phone1;
            $info->phone2 = $request->phone2;
            $info->save();
        }
        return back()->withMessage('Customer Support Info Saved Successfully');
    }
}
