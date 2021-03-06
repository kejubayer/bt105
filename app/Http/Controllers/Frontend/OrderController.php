<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('frontend.checkout', compact('cart'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->with('orderDetails')->first();
        return view('frontend.order_show', compact('order'));
    }

    public function orderSubmit(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'method' => 'required',
            'txn_id' => 'required',
            'price' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'txn_id' => $request->input('txn_id'),
                'method' => $request->input('method'),
                'price' => $request->input('price'),
                'user_id' => auth()->user()->id,
                'order_no' => 'Order_' . time() . '_' . auth()->user()->id,
                'status' => 'Pending'
            ];

            $order = Order::create($data);


            $cart = session()->has('cart') ? session()->get('cart') : [];
            foreach ($cart as $item) {
                $data_cart = [
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ];
                OrderDetail::create($data_cart);
            }
            session()->forget('cart');
            Mail::to(auth()->user()->email)->send(new OrderMail($order));
            Mail::to('jubayer.hrv@gmail.com')->send(new OrderMail($order));
            DB::commit();
            return redirect()->route('profile');
        } catch (\Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
