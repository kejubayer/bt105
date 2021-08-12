@extends('layouts.frontend')

@section('title') Home - @endsection

@section('main')

    <section class="py-5 text-center container">
        @if(session()->has('message'))
            <div class="row">
                <div class="col-md-4"></div>
                <div class="{{session()->get('alert_class')}} text-center col-md-4">{{session()->get('message')}}</div>
            </div>
        @endif
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Album example</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="{{route('show.cart')}}" class="btn btn-secondary my-2">View Cart</a>
                </p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($products as $product)
                <div class="col">
                    <div class="card shadow-sm">
{{--                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>--}}
                        <img src="{{asset('upload/products/'.$product->photo)}}" alt="">
                        <div class="card-body">
                            <h3 class="card-text">{{$product->name}}</h3>
                            <p class="card-text">{{$product->desc}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <a href="{{route('add.cart',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart</a>
                                </div>
                                <small class="text-muted">{{number_format($product->price)}} <strong>৳</strong></small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
    @endsection
