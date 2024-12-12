<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomAuthController extends Controller
{
    public function adulats()
    {
        return view('customAuth.index');
    }


    public function site()
    {
        return view('site');
    }
    public function admin()
    {
        return view('admin');
    }

    public function login(Request $request)
    {
        return view('auth.adminlogin');
    }
    public function check(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))){
          return redirect()->intended(route('admin'));   
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
