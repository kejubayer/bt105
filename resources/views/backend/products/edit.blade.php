@extends('layouts.backend')

@section('main')

   <div class="row">
       <div class="col-md-3"></div>
       <div class="col-md-6">
           <h2 class="text-center mt-3">Edit product</h2>
           <form action="{{route('admin.product.edit',$product->id)}}" method="post">
               @csrf
               <div class="mb-3">
                   <label for="name" class="form-label">Product Name</label>
                   <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
               </div>
               <div class="mb-3">
                   <label for="price" class="form-label">Product Price</label>
                   <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}">
               </div>
               <div class="mb-3">
                   <label for="desc" class="form-label">Product Description</label>
                   <textarea name="desc" class="form-control" id="desc">{{$product->desc}}</textarea>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
           </form>
       </div>
   </div>

@endsection
