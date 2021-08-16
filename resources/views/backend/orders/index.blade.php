@extends('layouts.backend')

@section('main')
    <h2 class="text-center mt-3">Order list</h2>
    @if(session()->has('message'))
        <div class="row">
            <div class="col-md-4"></div>
            <div class="{{session()->get('alert_class')}} text-center col-md-4">{{session()->get('message')}}</div>
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order No</th>
            <th scope="col">Customer</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key=>$order)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$order->order_no}}</td>
                <td>{{$order->user->name}}</td>
                <td>{{number_format($order->price)}} <strong class="text-primary">৳</strong></td>
                <td>{{$order->status}}</td>

                <td>
                    <a class="btn btn-primary" href="{{route('admin.order.show',$order->id)}}" title="View Order">View</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
