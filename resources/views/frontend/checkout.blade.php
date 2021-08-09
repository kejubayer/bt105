@extends('layouts.frontend')

@section('title') Cart - @endsection

@section('main')
    <div class="container">
        <div class="row">
            <h2 class="text-center m-3">Checkout</h2>
            <div class="col-md-6">
                <h2 class="text-center m-3">Product List</h2>
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

            </div>

            <div class="col-md-6">
                <h2 class="text-center m-3">Order Info</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('order')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{auth()->user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="text" class="form-control" name="phone" id="name" value="{{auth()->user()->phone}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address">{{auth()->user()->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="method" class="form-label">Payment Method</label>
                        <select name="method" id="method" class="form-control">
                            <option value="BKash">BKash</option>
                            <option value="Nogod">Nogod</option>
                            <option value="Rocket">Rocket</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="txn_id" class="form-label">Txn ID</label>
                        <input type="text" class="form-control" name="txn_id" id="txn_id">
                    </div>
                    <input type="hidden" name="price" value="{{$total_price}}">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection
