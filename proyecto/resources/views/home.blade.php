@extends('layouts.app')
@section('titulo')
CodeFinder
@endsection
@section('contenido')
<nav class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top" role="navigation-demo">
    <div class="container">
        <a class="navbar-brand">
            <div class="logo-small">
                <img src="{{ asset('img/code.png') }}" width="25px" height="25px" class="img-fluid">
            </div>
        </a>
        <a class="navbar-brand" href="#">CodeFinder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="dropdown nav-item inline-block">
                    <a href="#" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="profile-photo-small">
                            <img src="{{ asset('img/fotoUsuarios/default.jpg') }}" class="img-fluid rounded" width="30px" height="45px" style="margin-top:5px">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @role('admin')
                        <a href="{{ route('admin.panel') }}" class="dropdown-item">
                            Panel de Administrador
                        </a>
                        <hr>
                        @endrole
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
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            {{-- <div class="card border-0 shadow mb-4 d-lg-none">
                <div class="card-body">
                    <h5>ME CAGO EN DIOS</h5>
                </div>
            </div> --}}

            <div class="card border-0 shadow mb-4">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <h3 class="mx-auto font-weight-bold " style="width: 100px;">Posts</h3>
                    <hr>
                    Aquí irán los posts y demás
                </div>
            </div>

            {{-- <div class="native-standard"></div> --}}

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <h5 class="m-0">Más Cosas</h5>
                    <hr>
                    <ul class="mb-0">
                        <li>La prima de Jose la verdad es que está buenisima</li>
                        <li>A mi me pone bastante la perra esa</li>
                    </ul>
                </div>
            </div>

            {{-- <div class="card border-0 shadow mb-4">
                <div class="card-body">
                
                </div>
            </div> --}}
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow mb-4 d-lg-block">
                <div class="card-body">
                    <h3 class="text-center">Mi Perfil</h3>
                    <div class="text-center">
                        <img src="{{ Auth::user()->fotoPerfil }}" class="rounded-circle" width="62px" height="60px" />
                        <br><br>
                        <p><b>Nombre:</b> {{ Auth::user()->name }}</p>
                        <p><b>Usename:</b> {{ Auth::user()->username }}</p>
                        <p><b>Mis posts:</b></p>
                        <div class="text-center">
                            <div class="input-group" style="margin-left: 10px;">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary ml-2">Crear Posts</a>
                                <a href="#" class="btn btn-primary mr-2">Mis Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow mb-4 text-center">
                <div class="card-body">
                    <div class="small mb-2 font-weight-bold">Sigue los proyectos nuevos del creador del sitio!</div>
                    <a href="https://github.com/RubenGarciaGonzalez" class="btn btn-sm btn-block">
                        <div class="text-center">
                            <span class="text-primary">
                                <i class="fa fa-github"></i> Github
                            </span>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="text-center small">
                        <h5>Busca códigos por lenguajes</h5>
                    </div>
                    <br>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style=" width:100%; height: 300px;">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner my-2">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('img/php.png') }}" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/node.png') }}" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('img/js.png') }}" alt="Third slide">
                              </div>
                              <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('img/java.png') }}" alt="Forth slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Siguiente</span>
                            </a>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer-social my-5">
    <div class="container">
        <div class="d-flex justify-content-center">
            <a class="footer-social-link d-inline-flex mx-3 justify-content-center align-items-center text-white rounded-circle shadow btn btn-github" href=https://github.com/RubenGarciaGonzalez>
                <i class="fa fa-github"></i>
            </a>

            {{-- <a class="footer-social-link d-inline-flex mx-3 justify-content-center align-items-center text-white rounded-circle shadow btn btn-twitter" href="#">
                <i class="fa fa-linkedin"></i>
            </a> --}}
        </div>
    </div>
</div>
<div class="footer-main bg-dark py-5 small">
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
</footer>
@endsection
