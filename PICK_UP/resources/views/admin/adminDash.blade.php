@extends('layouts.app')
<br>
@section('content')
     <h4>Name: </hr>
    @if(Session::get('userAdmin')) {{Session::get('adminName')}} <br>
    <h4>ID: </hr>
    {{Session::get('userAdmin')}}
    <br>
    <br>
    <a class="btn btn-danger" href="{{route('logout')}}">Log out </a>
    @endif 
@endsection 