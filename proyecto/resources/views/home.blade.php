@extends('layouts.app')
@section('titulo')
    CodeFinder
@endsection
@section('contenido')
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top" role="navigation-demo">
        <div class="container">
          <a class="navbar-brand">
                <div class="logo-small">
                    <img src="{{asset('img/code.png')}}" width="25px" height="25px" class="img-fluid">
                </div>
            </a>
            <a class="navbar-brand" href="#">CodeFinder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">CodeFinder</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse text-center" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Buscar Código</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Lenguajes</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#" style="pointer-events: none; cursor: default;">{{ Auth::user()->username }}</a> 
                </li>
              <li class="dropdown nav-item inline-block">
                <a href="#" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="profile-photo-small">
                    <img src="{{asset('img/fotoUsuarios/default.jpg')}}" class="img-fluid rounded" width="30px" height="45px" style="margin-top:5px">
                </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="#" class="dropdown-item">Perfil</a>
                  <a href="#" class="dropdown-item">Mis Posts</a>
                  <a href="#" class="dropdown-item">
                        Posts Favoritos
                  </a>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Cerrar Sesión') }}
                    </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> 
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br><br><br>
      <div class="d-flex" id="wrapper">

    <div class="container-fluid text-center">
            <h1 class="mt-4">Simple Sidebar</h1>
            <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
          </div>
        </div>
      
      

      <footer id="footer" class="footer footer-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
