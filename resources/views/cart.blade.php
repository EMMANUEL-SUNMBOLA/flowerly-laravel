@extends('layouts.head')
@section('content')
    <div class="cart">
        {{ Auth::user()->name }}
    </div>
@endsection