@extends('layouts.backend')

@section('main')
    <h2 class="text-center mt-3">Product list</h2>
    @if(session()->has('message'))
        <div class="row">
            <div class="col-md-4"></div>
            <div class="{{session()->get('alert_class')}} text-center col-md-4">{{session()->get('message')}}</div>
        </div>
    @endif
    <a href="{{route('admin.product.create')}}" class="btn btn-primary">Add new Product</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Photo</th>
            <th scope="col">Desc</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $key=>$product)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price)}} <strong class="text-primary">৳</strong></td>
                <td><img src="{{asset('upload/products/'.$product->photo)}}" alt="" width="50px"></td>
                <td>{{$product->desc}}</td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.product.edit',$product->id)}}" title="Edit Product">Edit</a>
                    <a class="btn btn-danger" href="{{route('admin.product.delete',$product->id)}}" title="Delete Product">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$products->links()}}
@endsection
