@extends('layouts.head')
@section('content')
    <div class="cart">
        <div class="container">
            @foreach($carts as $cart)
                <div>
                    <div class="image">
                        <img src="{{$cart['img']}}" alt="">
                    </div>
                    <div class="cont">
                        <h1>{{$cart['name']}} </h1>
                        <h3>{{ $cart['details'] }}</h3>
                        <p>
                            @if($cart['instock'] > 10)
                                instock
                            @elseif($cart['instock'] <= 10 && $cart['instock'] > 0)
                                limited
                            @else
                                out of stock
                            @endif
                        </p>
                        <div class="more">
                            <button><i class="fa-solid fa-add"></i></button>
                            <input type="text">
                            <button><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection