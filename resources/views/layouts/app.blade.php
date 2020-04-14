<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DummyLibrary') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="justify-content:left;">
    <div id="app" class=" w-100"  >
        <nav class="navbar navbar-expand-md navbar-light shadow-sm text-white" style="background-color:#871B80; height:30vh;">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}" >
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    
                    <ul class="navbar-nav mr-auto ">
                        <li class="pr-3"> <a href="/catalog" class="text-white">Catalog</a> </li>
                        @if (auth()->user())
                    <li class="pr-3"><a href="/borrowed/{{auth()->user()->id}}" class="text-white">Renew</a> </li>
                        @else
                    <li class="pr-3"><a href="{{url('/login')}}" class="text-white">Renew</a> </li>  
                        @endif
                       
                    <li class="pr-3"><a href="/" class="text-white">My Account</a></li>
                        <li class="pr-3">Help</li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 w-100">
            {{--  --}}
            <div class="container  w-100">
               
                            <div class=" row mb-2 ml-5 py-1 pl-2" style="background-color:#560656;color:white;width:26%;">Search Books</div>
                            <div class="row mb-5 ml-5">
                                <form class="form-inline" action="/search">
                                    @csrf
                                  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search by title" aria-label="Search">
                                <button class="btn my-2 my-sm-0" type="submit" style="border:3px solid #560656;}">Search</button>
                                </form>
                            </div>
                    <div class="row  w-100">
                    <div class="col-3">
                        @auth
                            <ul clas="list-group list-group-flush">
                                <li class="list-group-item text-white" style="background-color:#560656;font-size:20px;">Your Account</li>
                                <li class="list-group-item"> <a href="/charges/{{auth()->user()->id}}">My Charges</a>
                                </li>
                            <li class="list-group-item"><a href="/borrowed/{{auth()->user()->id}}">My Loans</a></li>
                            <li class="list-group-item"><a href="/reserved/{{auth()->user()->id}}">My Reservations</a></li>
                                <li class="list-group-item">My Profile</li>
                            </ul>
                        @endauth                    
                    </div>       
                    <div class="col-9 mr-0 pr-0">
                        @yield('content')    
                    </div>
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
