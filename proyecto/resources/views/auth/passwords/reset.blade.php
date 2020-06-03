@extends('plantilla.plantilla')
@section('titulo')
Cambio de contraseña
@endsection
@section('contenido')
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top " role="navigation-demo">
    <div class="container">
        <a class="navbar-brand">
            <div class="logo-small">
                <img src="{{asset('img/code.png')}}" width="25px" height="25px" class="img-fluid">
            </div>
        </a>
        <a class="navbar-brand" href="{{route('index')}}">CodeFinder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">CodeFinder</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="#">Cambiando contraseña <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page-header header-filter" style="background-image: url('/img/background.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-xs-12 ml-auto mr-auto">
                <div class="card card-login" style="background-color:#212121">
                    <form class="form" method="POST" action="{{ route('password.update') }}" id="formUpdateContraseña">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="card-header card-header-info text-center">
                            <h4 class="card-title">Cambio de contraseña</h4>
                        </div>
                        <div class="card-body mt-5">
                            <div class="container">
                                <p class="text-center font-italic">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text justify-content-center">
                                                <i class="material-icons mr-3">mail</i>{{$email}}
                                        </span>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" style="opacity:0 !important;" >
                                    </div>
                                </p>
                            </div>
                            <p class="text-center text-danger" id="msgPassword"></p>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input id="password" type="password" placeholder="Contraseña nueva..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                                @if ($errors->get('password'))
                                  @foreach ($errors->get('password') as $error)
                                  <span class="invalid-feedback text-center" role="alert">
                                      <strong>{{ $error }}</strong>
                                  </span>
                                  @endforeach
                                @endif
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                </div>
                                <input id="password-confirm" type="password" placeholder="Confirma contraseña..." class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="text-center mt-5">
                                <a href="javascript:submitPasswords();" id="crear" type="submit" class="btn btn-info">Cambiar</a>
                                <a href="{{route('login') }}" class="btn">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-main bg-dark py-5 small d-block d-sm-block" id="footerAuth">
    <div class="container">
        Proyecto hecho con el Kit de UI 
        <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html">Material Kit</a>.
        <br>
        <div class="copyright float-left">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> CodeFinder, Inc.
        </div>
    </div>
</div>


{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
@endsection
