@extends('layouts.frontend')

@section('title') Cart - @endsection

@section('main')
    <div class="row">
        <h2 class="text-center mt-3">Your Cart</h2>
        <div class="col-md-2"></div>
        <div class="col-md-8">
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

                @foreach($cart as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                        <td>{{$item['price']}} BDT</td>
                        <td>{{$item['quantity']}}</td>
                        <td>{{$item['quantity'] * $item['price']}} BDT</td>
                    </tr>
                    @php
                        $total_price += $item['quantity'] * $item['price'];
                        $total_quantity += $item['quantity'];
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

            @if(count($cart) == 0)
            <h2 class="bg-warning text-center">No Product Added to Cart</h2>
                <p class="text-center">Go <a href="{{route('home')}}">product page</a> and add product to cart</p>
            @endif
        </div>
    </div>


@endsection
