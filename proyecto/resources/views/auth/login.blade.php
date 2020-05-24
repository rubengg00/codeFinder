@extends('plantilla.plantilla')
@section('titulo')
    Inicio de Sesión
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">CodeFinder</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse text-center">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active mx-2">
                <a class="nav-link" href="#">Iniciar Sesión <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('register') }}">Registrarse</span></a>
            </li>
        </ul>
    </div>
    </div>
</nav>
  <div class="page-header header-filter" style="background-image: url('img/background.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12 ml-auto mr-auto">
          <div class="card card-login" style="background-color:#212121">
            <form class="form" method="POST" action="{{ route('login')}}">
            @csrf
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Login</h4>
              </div>
              <div class="card-body mt-5">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-Mail..." autocomplete="email" required>
                  {{-- @error('email')
                  <span class="invalid-feedback text-center" role="alert">
                      <strong class="text-center">{{ $message }}</strong>
                  </span>
                @enderror --}}
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" name="password" type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Contraseña..." required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-center">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember">
                        Recordar usuario
                        <span class="form-check-sign">
                            <span class="check"></span>
                        </span>
                    </label>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-info">Inicia Sesion</button>
                </div>
                <div class="text-center mt-3">
                    <p style="color:white">¿No tienes cuenta todavía? <a href="{{route('register')}}">Regístrate</a></p>
                </div>
                <div class="text-center mt-3">
                  <p><a href="{{ route('password.request') }}"><em>He olvidado mi contraseña</em></a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer id="footer"class="footer footer-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="container">
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script> CodeFinder, Inc.
    </div>
  </div>
</footer>
@endsection
