@extends('layouts.frontend')

@section('main')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="text-center mt-3">Login Form</h2>

            @if(session()->has('message'))
                <div class="{{session()->get('alert_class')}} text-center">{{session()->get('message')}}</div>
            @endif

            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection

