@extends('layouts.backend')

@section('main')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="text-center mt-3">Create new user</h2>
            {{-- @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif--}}
            <form action="{{route('admin.user.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label ">Full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name"
                           value="{{old('name')}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
                           id="email" value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label ">Phone Number</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror "
                           id="phone" value="{{old('phone')}}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label ">Address</label>
                    <textarea name="address" id="address"
                              class="form-control @error('address') is-invalid @enderror ">{{old('address')}}</textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label ">Role</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="admin">Admin</option>
                        <option value="customer">Customer</option>
                    </select>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label ">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror "
                           id="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
