<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        tr , th , td  {
            border: 1px solid black;
            padding: 5%;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Oder NO: {{$order->order_no}}</h1>
<h2>Name: {{$order->name}}</h2>
<h2>Phone: {{$order->phone}}</h2>
<h2>Address: {{$order->address}}</h2>
<h2>Status: {{$order->status}}</h2>
<h2>Price: {{$order->price}}</h2>

<table>
    <thead>
    <tr>
        <th>Product name</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
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
        <td><span style="font-weight: bold; color: red">Total</span></td>
        <td>{{$total_quantity}}</td>
        <td>{{$total_price}} BDT</td>
    </tr>
    </tbody>
</table>


</body>
</html>
