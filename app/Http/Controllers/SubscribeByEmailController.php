<?php

namespace App\Http\Controllers;

use App\SubscribeByEmail;
use Illuminate\Http\Request;

class SubscribeByEmailController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|string|email'
        ]);

        $checkSubscribe = SubscribeByEmail::where('email',$request->email)->count();
        if ($checkSubscribe < 0) {
            $subscribe = new SubscribeByEmail();
            $subscribe->email = $request->email;
            $subscribe->save();
        }
        return back();
    }
}
