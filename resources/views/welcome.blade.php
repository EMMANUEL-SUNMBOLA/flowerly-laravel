    @extends('layouts.head')
    @section('content')
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
                        <form action="/add/{{ $product->id }}" method="POST">
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