@extends('layouts.app')
@section('content')
<table class="table table-border">
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Product Details</th>
        <th>Address</th>
        <th>Phone Number </th>
        <th>Email</th>
    </tr>
    @foreach($requestOrderToServiceProviders as $requestOrderToServiceProvider)
    <tr>
        <td>{{$requestOrderToServiceProvider->productname}}</td>
        <td>{{$requestOrderToServiceProvider->quantity}}</td>
        <td>{{$requestOrderToServiceProvider->productdetails}}</td>
        <td>{{$requestOrderToServiceProvider->address}}</td>
        <td>{{$requestOrderToServiceProvider->phone}}</td>
        <td>{{$requestOrderToServiceProvider->email}}</td>
        </tr>
    @endforeach

</table>
<div class="d-flex justify-content-center">
  
</div>
@endsection