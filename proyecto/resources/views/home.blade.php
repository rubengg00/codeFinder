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
          <div class="collapse navbar-collapse text-center">
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
              <li class="dropdown nav-item">
                <a href="#" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="profile-photo-small">
                    <img src="{{asset('img/fotoUsuarios/default.jpg')}}" class="img-fluid rounded" width="50px" height="60px">
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
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-->
      </nav>

      <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/background.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center animated tada delay-1s">
                        <img src="{{asset('img/ideaLogo.png')}}" width="270px" height="210px">
                        <h1 id="titulo">CodeFinder</h1>
                        <h3 class="title text-center" id="titulo" style="font-style: italic">Tu biblioteca de código</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised ">
        <div class="container">
            <div class="flow-lg-row" id="textoIndex">
                    <br>
                    <p class="h1 text-center my-2 font-italic">Busca. Pregunta. Guarda</p>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">
                            CodeFinder es un portal web creado y diseñado para los programadores. Aquí, podrás buscar
                            códigos de aplicaciones de usuarios, para poder implementarlos en tus proyectos, e incluso
                            guardarlos como favoritos, para acceder a ellos de una forma más sencilla. 
                        </p>
                    </blockquote>
                    <br>
                    <h5></h5>
            </div>
        </div>
    </div>
    

    <footer class="footer footer-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="container">
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, hecho con <i class="material-icons">favorite</i> por
                <a href="https://github.com/RubenGarciaGonzalez" target="blank">Ruben Garcia</a>.
            </div>
        </div>
    </footer>
@endsection
