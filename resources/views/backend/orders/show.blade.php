@extends('layouts.backend')

@section('main')
    <div class="container">
        <div class="row">
            <h2 class="text-center mt-3">Order Details</h2>
            @if(session()->has('message'))
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="{{session()->get('alert_class')}} text-center col-md-4">{{session()->get('message')}}</div>
                </div>
            @endif
            <div class="row mt-3">
                <div class="col-md-4">
                    <h5>Order Details:</h5>
                    <p><strong>Order NO: </strong>{{$order->order_no}}</p>
                    <p><strong>Total Price: </strong>{{$order->price}}</p>
                    <p><strong>Order Status: </strong>{{$order->status}}</p>
                    <p><strong>Payment Method: </strong>{{$order->method}}</p>
                    <p><strong>TXN Id: </strong>{{$order->txn_id}}</p>
                </div>
                <div class="col-md-4">
                    <h5>Belling address: </h5>
                    <p><strong>Customer Name: </strong>{{$order->user->name}}</p>
                    <p><strong>Customer Email: </strong>{{$order->user->email}}</p>
                    <p><strong>Customer Phone: </strong>{{$order->user->phone}}</p>
                    <p><strong>Customer address: </strong>{{$order->user->address}}</p>

                </div>
                <div class="col-md-4">
                    <h5>Shipping address: </h5>
                    <p><strong>Name: </strong>{{$order->name}}</p>
                    <p><strong>Phone: </strong>{{$order->phone}}</p>
                    <p><strong>Address: </strong>{{$order->address}}</p>

                </div>
            </div>
            <div class="col-md-8">
                <h4 class="text-center">Product List</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $total_price = 0;
                        $total_quantity = 0;
                    @endphp

                    @foreach($order->orderDetails as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}} BDT</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->quantity * $item->price}} BDT</td>
                        </tr>
                        @php
                            $total_price += $item->quantity * $item->price;
                            $total_quantity += $item->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td></td>
                        <td><span class="text-danger" style="font-weight: bold">Total</span></td>
                        <td>{{$total_quantity}}</td>
                        <td>{{$total_price}} BDT</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">Update Status</h4>
                <form action="{{route('admin.order.status',$order->id)}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Select Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="Pending" @if($order->status == 'Pending') selected @endif >Pending</option>
                            <option value="Processing" @if($order->status == 'Processing') selected @endif >Processing</option>
                            <option value="Delivery" @if($order->status == 'Delivery') selected @endif >Delivery</option>
                            <option value="Completed" @if($order->status == 'Completed') selected @endif >Completed</option>
                            <option value="Rejected" @if($order->status == 'Rejected') selected @endif >Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
