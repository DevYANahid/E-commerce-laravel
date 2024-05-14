<?php

namespace App\Http\Controllers;

use App\AboutCompany;
use Illuminate\Http\Request;

class AboutCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function about(Request $request)
    {
        $this->validate($request,[
            'company_about' => 'required'
        ]);

        $countAbout = AboutCompany::count();
        if ($countAbout > 0){
            $about = AboutCompany::find(1);
            $about->about_us = $request->company_about;
            $about->save();
        }else{
            $about = new AboutCompany();
            $about->about_us = $request->company_about;
            $about->save();
        }
        return back()->withMessage('About Company Content Saved Successfully');
    }
}
