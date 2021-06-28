<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        return view('backend.products.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
        ];
        if (!empty($request->file('photo'))){
            $newName= 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->photo->move('upload/products/',$newName);
            $data['photo']=$newName;
        }
        Product::create($data);
        return redirect()->route('admin.product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('backend.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $data = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'desc' => $request->input('desc'),
        ];
        if (!empty($request->file('photo'))){
            if (file_exists('upload/products/'.$product->photo)){
                unlink('upload/products/'.$product->photo);
            }
            $newName= 'product_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
            $request->photo->move('upload/products/',$newName);
            $data['photo']=$newName;
        }
        $product->update($data);
        return redirect()->route('admin.product');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (file_exists('upload/products/'.$product->photo)){
            unlink('upload/products/'.$product->photo);
        }

        $product->delete();
        return redirect()->back();
    }
}
