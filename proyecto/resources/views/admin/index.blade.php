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
        <a class="navbar-brand" href="{{ route('home') }}">CodeFinder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">CodeFinder</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Buscar Código</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Lenguajes</a>
                </li>
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="#">Panel Admin <span class="sr-only">(current)</span></a>
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
                        <a href="#" class="dropdown-item">Panel de Administrador</a>
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
<div class="container" id="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border-0 shadow mb-4" id="card">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <h2 class="text-center">Panel del Administrador</h2>
                    <h3 class="text-center">Bienvenidos al panel de administrador <span class="font-weight-bold font-italic">{{ Auth::user()->username }}</span></h3>
                    <br>
                    <div class="row  ">
                            <div class="col-md-6 ml-auto mr-auto">
                                <div class="d-flex flex-row border rounded">
                                    <div class="p-0 w-25">
                                        <img src="{{ asset(Auth::user()->fotoPerfil) }}" class="img-thumbnail border-0" />
                                    </div>
                                    <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
                                        <h4 class="text-primary">{{ Auth::user()->name }}</h4>
                                        <h5 class="text-info">Desarrollador de Aplicaciones Web</h5>
                                        <ul class="m-0 float-left" style="list-style: none; margin:0; padding: 0">
                                            <a href="#" class="text-dark"><i class="fa fa-linkedin-square"></i> LinkedIn</a><br>
                                            <a href="#" class="text-dark"><i class="fa fa-github-square"></i> Github</a>
                                        </ul>
                                        <p class="text-right m-0"><a href="#" class="btn btn-primary"><i class="fa fa-user"></i> View Profile</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    <h5 class="text-center">En esta página podrás ver, editar, y eliminar a todos los <span class="text-info font-italic">usuarios</span>, <span class="text-danger font-italic">posts</span> y
                        <span class="text-warning font-italic">comentarios</span>.
                    </h5>
                </div>
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile-tabs">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.users') }}">
                                        <i class="material-icons">perm_identity</i> Usuarios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.posts') }}">
                                        <i class="material-icons">library_books</i> Posts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.comments') }}">
                                        <i class="material-icons">comment</i> Comentarios
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer1" class="footer-main bg-dark small d-none d-sm-none d-md-block">
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

@endsection
