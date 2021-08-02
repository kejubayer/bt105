<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->has('cart') ? session()->get('cart') : [];

        if (key_exists($product->id, $cart)) {
            $cart[$product->id]['quantity'] += 1;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session(['cart' => $cart]);
        return redirect()->back();
    }

    public function showCart()
    {
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('frontend.cart',compact('cart'));
    }
}
