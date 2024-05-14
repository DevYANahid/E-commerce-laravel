<?php

namespace App\Http\Controllers;

use App\Company;
use App\Payment;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setCompanyInfo(Request $request)
    {
        $this->validate($request,[
            'company_name' => 'required',
        ]);
        $countInfo = Company::count();
        if ($countInfo > 0){
            $info = Company::find(1);
            $info->name = $request->company_name;
            $info->save();
        }else{
            $info = new Company();
            $info->name = $request->company_name;
            $info->save();
        }
        return back()->withMessage('Company Name Saved Successfully');
    }

    public function countrySelect(Request $request)
    {
        $this->validate($request,[
            'selected_countries' => 'required|min:1'
        ]);
        $company = Company::find(1);
        if ($request->has('selected_countries')) {
            $company->countries()->sync($request->selected_countries);
        }else{
            $company->countries()->sync(array());
        }
        return back()->withMessage('Country Selected Successfully');
    }

    public function paymentSelect(Request $request)
    {
        $this->validate($request,[
            'selected_payments' => 'required|min:1'
        ]);
//        dd($request);
        $company = Company::find(1);
        if ($request->has('selected_payments')) {
            $company->payments()->sync($request->selected_payments);
        }else{
            $company->payments()->sync(array());
        }
        return back()->withMessage('Payment Selected Successfully');
    }

    public function paymentUpdate(Request $request, Payment $payment)
    {
        $this->validate($request,[
            'number' => 'required',
        ]);

        $payment->number = $request->number;
        $payment->type = $request->type;
        $payment->save();
        return back()->withMessage($payment->name . ' Updated syccessfully');
    }

//    public function payment_info(Payment $payment)
//    {
//        return response()->json($payment);
//    }
}
