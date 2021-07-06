<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('backend.users.index',compact('users'));
    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function store(Request $request)
    {
        try {
            try {
                $request->validate([
                    'name'=>'required',
                    'email'=>'required|email|unique:users,email',
                    'phone'=>'required',
                    'address'=>'required',
                    'role'=>'required',
                    'password'=>'required',
                ]);
            }catch (\Exception $exception){
                $error = $exception->validator->getMessageBag();
                return redirect()->back()->withErrors($error)->withInput();
            }
            $data = [
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address'),
                'role'=>$request->input('role'),
                'password'=>Hash::make($request->input('password')),
            ];
            User::create($data);
            return redirect()->route('admin.user');

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.users.edit',compact('user'));
    }

    public function update(Request $request,$id)
    {

        try {
            $user = User::find($id);
            try {
                $request->validate([
                    'name'=>'required',
                    'email'=>'required|email|unique:users,email,'.$user->id,
                    'phone'=>'required',
                    'address'=>'required',
                    'role'=>'required',
                ]);
            }catch (\Exception $exception){
                $error = $exception->validator->getMessageBag();
                return redirect()->back()->withErrors($error)->withInput();
            }
            $data = [
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'address'=>$request->input('address'),
                'role'=>$request->input('role'),
            ];
            $user->update($data);
            return redirect()->route('admin.user');

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
