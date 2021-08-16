<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.orders.show', compact('order'));
    }

    public function status(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required',
            ]);
            $order = Order::find($id);
            $order->update([
                'status' => $request->input('status')
            ]);

            Session::flash('message', 'Order Status Updated!');
            Session::flash('alert_class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $exception) {
            Session::flash('message', $exception->getMessage());
            Session::flash('alert_class', 'alert-danger');
            $error = $exception->validator->getMessageBag();
            return redirect()->back()->withErrors($error)->withInput();
        }

    }
}
