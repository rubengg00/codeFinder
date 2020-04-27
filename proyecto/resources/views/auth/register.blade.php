@extends('plantilla.plantilla')
@section('titulo')
    Registro
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
            <li class="nav-item mx-2">
                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión </a>
            </li>
            <li class="nav-item active mx-2">
                <a class="nav-link" href="#">Registrarse <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
    </div>
</nav>
  <div class="page-header header-filter" style="background-image: url('img/background.jpg'); background-size: cover; background-position: top center;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12 ml-auto mr-auto mt-3">
          <div class="card card-login" style="background-color:#212121">
            <form class="form" method="POST" action="{{route('register')}}">
                @csrf
              <div class="card-header card-header-info text-center">
                <h4 class="card-title">Registro</h4>
              </div>
              <div class="card-body mt-5">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">account_box</i>
                        </span>
                    </div>
                    <input id="name" type="text" placeholder="Nombre..." class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                    </span>
                    </div>
                    <input id="username" type="text" placeholder="Nombre de usuario..." class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                        @error('username')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{  $errors->first('username') }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" placeholder="E-Mail..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{  $errors->first('email') }} </strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" placeholder="Contraseña..." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">lock_outline</i>
                        </span>
                    </div>
                    <input id="password-confirm" type="password" placeholder="Repite Contraseña..." class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-info">Crear</button>
                    <a href="{{ URL::previous() }}" class="btn">Volver</a>
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
