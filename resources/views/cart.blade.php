@extends('layouts.head')
@section('content')
<div class="cart">
        <div class="total">
            <h1>cart summary</h1>
            <h3>Subtotal {{ $price }}</h4>
            <p>Delivery fees not included yet</p>
            <form action="">
                <button>CHECKOUT (<i class="fa-solid fa-naira-sign"> {{ $price }} </i>)</button>
            </form>
        </div>
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
                            <button class="addBtn"><i class="fa-solid fa-add"></i></button>
                            <input type="text" id="inpt">
                            <button class="subBtn"><i class="fa-solid fa-minus"></i></button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>

    </script>
@endsection