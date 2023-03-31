@extends('layouts.app')
<br>
@section('content')
    <div class="col-md-3">
        @foreach ($products as $item)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('images/'.$item->image)}}" alt="Card image cap">
                <div class="card-body">
                <p class="card-text text-center">{{$item->name}}<br>
                <span>Price: BDT{{$item->price}}</span><br>
                @if(Session::has('user'))
                <a href="{{route('products.addtocart',['id'=>$item->id])}}" class="btn btn-primary" style="color:white">Add to Cart</a></p>
                @elseif(Session::has('userClient'))
                <a href="{{route('products.productdelete',['price'=>$item->price])}}" class="btn btn-primary" style="color:white">Product Detete</a></p>
                
                @else
                <a href="{{route('products.addtocart',['id'=>$item->id])}}" class="btn btn-primary" style="color:white">Add to Cart</a></p>
                
                
                @endif
        
            </div>
            </div>
        @endforeach
    </div>  
         
@endsection 