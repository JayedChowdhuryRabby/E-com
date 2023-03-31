@extends('layouts.app')
<br>
@section('content')
     <h4>Name: </hr>
    @if(Session::get('userName')) {{Session::get('userName')}} <br>
    <h4>ID: </hr>
    {{Session::get('user')}}
    <br>
    <br>
    <a class="btn btn-danger" href="{{route('logout')}}">Log out </a>
    @endif 
@endsection 