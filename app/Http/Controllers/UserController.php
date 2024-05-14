<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function userEmailUpdate(Request $request, User $user)
    {
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $user->email = $request->email;
        $user->email_verified_at = null;
        $user->save();
        return back()->withMessage('Login Email Changed Successfully');
    }
}
