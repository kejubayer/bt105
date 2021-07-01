@extends('layouts.backend')

@section('main')

   <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6">
           <h2 class="text-center mt-3">Create new product</h2>
          {{-- @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif--}}
           <form action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="mb-3">
                   <label for="name" class="form-label ">Product Name</label>
                   <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name" value="{{old('name')}}">
                   @error('name')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                   <label for="price" class="form-label">Product Price</label>
                   <input type="number" name="price" class="form-control @error('price') is-invalid @enderror " id="price" value="{{old('price')}}">
                   @error('price')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mb-3">
                   <label for="desc" class="form-label">Product Description</label>
                   <textarea name="desc" class="form-control" id="desc">{{old('desc')}}</textarea>

               </div>
               <div class="mb-3">
                   <label for="photo" class="form-label">Photo</label>
                   <input type="file" name="photo" class="form-control" id="photo" >
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       </div>
   </div>

@endsection
