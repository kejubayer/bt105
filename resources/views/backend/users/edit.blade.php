@extends('layouts.backend')

@section('main')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2 class="text-center mt-3">Edit user</h2>
            {{-- @if ($errors->any())
                 <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
             @endif--}}
            <form action="{{route('admin.user.edit',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label ">Full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name"
                           value="{{$user->name}}">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label ">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror "
                           id="email" value="{{$user->email}}">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label ">Phone Number</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror "
                           id="phone" value="{{$user->phone}}">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label ">Address</label>
                    <textarea name="address" id="address"
                              class="form-control @error('address') is-invalid @enderror ">{{$user->address}}</textarea>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label ">Role</label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                        <option value="customer" @if($user->role == 'customer') selected @endif >Customer</option>
                    </select>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
