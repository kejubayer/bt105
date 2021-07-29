<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            return redirect()->route('home');
        }
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
