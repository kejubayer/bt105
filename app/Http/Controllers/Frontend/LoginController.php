<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\Test;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function register()
    {
        return view('frontend.register');
    }

    public function doRegister(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:3',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'role' => 'customer',
            'password' => Hash::make($request->input('password')),
        ];
        $user = User::create($data);

        Mail::to($user->email)->send(new Test());

        return redirect()->route('home');
    }

    public function profile()
    {
        $orders = Order::where('user_id',auth()->user()->id)->with('orderDetails')->orderBy('id','desc')->get();
        return view('frontend.profile',compact('orders'));
    }

    public function profileEdit(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ];
        $user->update($data);
        return redirect()->back();
    }


}
