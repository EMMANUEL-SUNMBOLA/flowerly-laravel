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
        <main>
            <h1>Welcome to Flowerly</h1>
            <button id="buyBtn">Buy <i class="fa-solid fa-arrow-right"></i></button>
        </main>

        <section class="products" id="products">
            <h1>our products</h1>
            <div class="container">
                @foreach($products as $product)
                    <div>
                        <img src="{{ $product->url }}" alt="">
                        <h4>{{ $product->name }}</h4>
                        <p>{{ $product->details }}</p>
                        <h6>{{ $product->instock }} Pieces left</h6>
                        <form action="/add/{{ $product->id }}" method="post">
                            @csrf
                            <button>${{ $product->price }}</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </section>
        <script>
        document.querySelector('#buyBtn').addEventListener("click", ()=>{ window.location.href = "#products";
        })
        </script>
    @endsection