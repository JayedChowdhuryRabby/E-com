@extends('layouts.app')
<br>
@section('content')
     <h4>Name: </hr>
    @if(Session::get('userClient')) {{Session::get('userClient')}} <br>
    <h4>ID: </hr>
    {{Session::get('id')}}
    <br>
    <br>
   
    <a class="btn btn-danger" href="{{route('logout')}}">Log out </a>
    @endif 
@endsection 