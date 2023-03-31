@extends('layouts.app')
<br>
@section('content')
<form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row ">
           
    <div class="form-group">
        <span>Product Name</span>
        <input type="text" name="name" value="{{old('name')}}" class="form-control">
        @error('name')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <br>
    <div class=" form-group">
        <span>Product Price</span>
        <input type="number" name="price" value="{{old('price')}}" class="form-control">
        @error('price')
            <span class="text-danger">{{$message}}</span>
        @enderror
        <br>
    </div>

                <br>
                <br>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>

</br>
<br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
            </div>

        </form>

@endsection
