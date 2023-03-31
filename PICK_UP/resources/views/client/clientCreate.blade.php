@extends('layouts.app')
<br>

@section('content')
<h2>Client Registration</h2>
<form action="{{route('clientCreate')}}" class="form-group" method="post">
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
        <span>Name</span>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    <div class="col-md-4 form-group">
        <span>Shop name</span>
        <input type="text" name="shopname" value="{{old('shopname')}}" class="form-control">
        @error('shopname')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


   
    <div class="col-md-4 form-group">
        <span>Email</span>
        <input type="text" name="email" value="{{old('email')}}" class="form-control">
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
        <input type="text" name="mobileNumber" value="{{old('mobileNumber')}}" class="form-control">
        @error('mobileNumber')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>

    
    <div class="col-md-4 form-group">
        <span>Password</span>
        <input type="text" name="password" value="{{old('password')}}" class="form-control">
    </div>
    
    <br><input type="submit" class="btn btn-success" value="submit" ></br>            
</form>
@endsection
