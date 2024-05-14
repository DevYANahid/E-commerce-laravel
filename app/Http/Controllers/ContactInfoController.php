<?php

namespace App\Http\Controllers;

use App\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function modifyContact(Request $request)
    {
        $this->validate($request,[
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'min:11', 'max:14'],
            'email' => ['required', 'string', 'email']
        ]);
        $contactInfo = ContactInfo::all();
//        'address', 'phone', 'email',
        if (count($contactInfo) < 1){
            $info = new ContactInfo();
            $info->address = $request->address;
            $info->phone = $request->phone;
            $info->email = $request->email;
            $info->save();
        }else{
            $info = ContactInfo::find(1);
            $info->address = $request->address;
            $info->phone = $request->phone;
            $info->email = $request->email;
            $info->save();
        }
        return back()->withMessage('Contact Info Saved Successfully');
    }
}
