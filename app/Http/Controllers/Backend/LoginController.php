<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function doLogin(Request $request)
    {
        $cred = $request->except('_token');
        if (auth()->attempt($cred)) {
            if (auth()->user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }
            Session::flash('message','Login Successful!');
            Session::flash('alert_class','alert-success');
            return redirect()->route('home');
        }
        Session::flash('message','Invalid Email or Password!');
        Session::flash('alert_class','alert-danger');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        Session::flash('message','Logout Successful!');
        Session::flash('alert_class','alert-danger');
        return redirect()->route('home');
    }
}
