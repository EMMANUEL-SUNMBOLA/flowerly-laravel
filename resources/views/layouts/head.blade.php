<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/dist/style.css">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body class="antialiased">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex">
            <a class="nav-brand" href="/">Flowerly</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                @if (Route::has('login'))
                    <div class="navbar-nav d-flex">
                        <a href="" class="nav-link">Pricing</a>
                        <a href="" class="nav-link">Contact Us</a>
                        @auth
                            <a href="{{ url('/cart') }}" class="nav-link">Cart</a>
                            <div class="dropdown">
                                <a class="nav-link" id="triggerDown">{{ strtoupper(Auth::user()->name) }} <i class="fa-solid fa-chevron-down"></i></a>
                                <div class="content" id="down">
                                    <p id="Cart"><a class="" href="{{ url('/dashboard') }}">Profile</a></p>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <p onclick="event.preventDefault();                     this.closest('form').submit();"><a href="route('logout')" class="">Log Out</a></p>
                                    </form>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>


        @yield('content')
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/dist/main.js"></script>
</html>