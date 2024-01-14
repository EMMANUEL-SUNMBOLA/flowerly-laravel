@extends('layouts.head')
@section('content')
@if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show text-uppercase" role="alert">
        <strong>Success <i class="fa-solid fa-check"></i> </strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@elseif(session()->has('err'))
        <div class="alert alert-danger alert-dismissible fade show text-uppercase" role="alert">
        <strong>Error <i class="fa-solid fa-triangle-exclamation"></i></strong> {{ session('err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
@endif
<div class="cart">
        <div class="total">
            <h1>cart summary</h1>
            @if(isset($price))
            <h3>Subtotal {{ $price }}</h4>
            <p>Delivery fees not included yet</p>
            <form action="">
                <button disabled="disabled">CHECKOUT (<i class="fa-solid fa-naira-sign"> {{ $price }} </i>)</button>
            </form>
            @endif
        </div>
        <div class="container">
            @if(isset($carts))
            @foreach($carts as $key => $cart)
            @if(!empty($cart))
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
                            <div class="more-cont">
                                <form action="/add/{{ $cart['id'] }}" method="post">
                                    @csrf
                                    <button class="addBtn"><i class="fa-solid fa-add"></i></button>
                                </form>
                                <input type="text" class="inpt" value="{{ $cart['ammount'] }}">
                                <form action="/reduce/{{ $cart['id'] }}" method="post">
                                    @csrf
                                    <button class="subBtn"><i class="fa-solid fa-minus"></i></button>
                                </form>
                            </div>
                            <form action="/delete/{{ $cart['id'] }}" method="post">
                                @csrf
                                <input type="hidden" name="remove" value="true">
                                <button><i class="fa-solid fa-trash"> Delete</i></button>
                            </form>

                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            @endif
        </div>
    </div>
        <script>
            let subBtns = document.querySelectorAll('.subBtn');
            let addBtns = document.querySelectorAll('.addBtn');
            let inpts = document.querySelectorAll('.inpt');

            addBtns.forEach((addBtn, index) => {
                    addBtn.addEventListener("click", () => {
                    // Convert the input value to a number
                    let inputValue = parseInt(inpts[index].value);
                
                    // Check if the parsed value is a number and greater than 0
                    if (!isNaN(inputValue)) {
                        // Increment the value
                        inpts[index].value = inputValue + 1;
                        //smart
                        subBtns[index].disabled = parseInt(inpts[index].value) <= 1;
                    }
                });
            });

            subBtns.forEach((subBtn, index) => {
                subBtn.addEventListener("click", () => {
                    let inputValue = parseInt(inpts[index].value);
                
                    if (!isNaN(inputValue) && inputValue > 1) {
                        // Decrement the value
                        inpts[index].value = inputValue - 1;
                    }
                    // Enable the button if the current value is greater than 1
                    subBtns[index].disabled = parseInt(inpts[index].value) < 2;
                })
            });
        </script>
@endsection