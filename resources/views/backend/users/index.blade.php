@extends('layouts.backend')

@section('main')
    <h2 class="text-center mt-3">Users list</h2>
    <a href="{{route('admin.user.create')}}" class="btn btn-primary">Add new User</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=>$user)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a class="btn btn-warning" href="{{route('admin.user.edit',$user->id)}}" title="Edit Product">Edit</a>
                    <a class="btn btn-danger" href="{{route('admin.user.delete',$user->id)}}"
                       title="Delete Product">Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
        {{$users->links()}}
@endsection
