@extends('layouts.app')
@section('content')
<table class="table table-border">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number </th>
    </tr>
    @foreach($customers as $customer)
    <tr>
        <td>{{$customer->name}}</td>
        <td>{{$customer->email}}</td>
        <td>{{$customer->phone}}</td>
        <td><a href="/customerEdit/{{$customer->customer_id}}">Details</a></td>
        <td><a href="/ccustomerDelete/{{$customer->name}}">Delete</a></td>  
       
        </tr>
    @endforeach

</table>
<div class="d-flex justify-content-center">
  
</div>
@endsection