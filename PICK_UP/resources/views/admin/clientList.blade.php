@extends('layouts.app')
@section('content')
<table class="table table-border">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number </th>
    </tr>
    @foreach($clients as $client)
    <tr>
        <td>{{$client->name}}</td>
        <td>{{$client->email}}</td>
        <td>{{$client->mobileNumber}}</td>
        <td><a href="/clientEdit/{{$client->id}}">Details</a></td>
        <td> <a href="{{route('clients.clientDelete',['email'=>$client->email])}}" class="btn btn-primary" style="color:white">Detete</a></td>
        </tr>
    @endforeach

</table>
<div class="d-flex justify-content-center">
  
</div>
@endsection