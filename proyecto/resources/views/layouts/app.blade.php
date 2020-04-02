<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('material/assets/css/material-kit.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('node_modules/animate.css/animate.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:500&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('img/icon.png')}}" sizes="80x80">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{asset('sticker.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('titulo')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

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
                                    <img src="{{asset('img/fotoUsuarios/default.jpg')}}" class="rounded-circle mr-2" width="30px" height="30px">
                                    {{ Auth::user()->username }} <span class="caret"></span>
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
        </nav> --}}

            @yield('contenido')
        

        <!--Scripts necesarios para la funcionalidad de la página-->
    <script src="{{asset('material/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('material/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/material-kit.js')}}" type="text/javascript"></script>
    </div>
</body>
</html>
