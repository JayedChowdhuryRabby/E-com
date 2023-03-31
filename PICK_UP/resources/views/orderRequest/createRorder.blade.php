@extends('layouts.app')
<br>

@section('content')
<h2>Request Order to Service Provider</h2>
<form action="{{route('createRorder')}}" class="form-group" method="post">
    <!-- Cross Site Request Forgery-->
    {{csrf_field()}}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="col-md-4 form-group">
        <span>Product Name</span>
        <input type="text" name="productname" value="{{old('productname')}}" class="form-control">
        @error('productname')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Quantity</span>
        <input type="text" name="quantity" value="{{old('quantity')}}" class="form-control">
        @error('quantity')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Product Details</span>
        <input type="text" name="productdetails" value="{{old('productdetails')}}" class="form-control">
        @error('productdetails')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>  

   
  <div class="col-md-4 form-group">
        <span>Address</span>
        <input type="text" name="address" value="{{old('address')}}" class="form-control">
        @error('address')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div class="col-md-4 form-group">
        <span>Mobile Number</span>
        <input type="number" name="phone" value="{{old('phone')}}" class="form-control">
        @error('phone')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


   
    <div class="col-md-4 form-group">
        <span>Email</span>
        <input type="text" name="email" value="{{old('email')}}" class="form-control">
    </div>



    
    <br><input type="submit" class="btn btn-success" value="Request Order" ></br>            
</form>
@endsection
