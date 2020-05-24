@extends('plantilla.plantilla')
@section('titulo')
Editando Categoría
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
                <li class="nav-item active mx-2">
                        <a class="nav-link" href="#">Editando  <span class="sr-only">(current)</span></a>
                    </li>
                <li class="nav-item mx-2 dropdown nav-item inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar Código <span class="sr-only">(current)</span></a>
                        <div class="dropdown-menu dropdown-menu-center">
                            <a href="{{ route('posts.buscador') }}" class="dropdown-item">Título</a>
                            <a href="{{ route('categorias.listado') }}" class="dropdown-item">Categoría</a>
                        </div>
                    </li>
                
                <li class="dropdown nav-item inline-block" id="lista">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                    <div class="dropdown-menu dropdown-menu-center">
                        @role('admin')
                        <a href="{{ route('admin.index') }}" class="dropdown-item">
                            Panel de Administrador
                        </a>
                        <hr>
                        @endrole
                        <a href="{{ route('users.show', Auth::user()) }}" class="dropdown-item">Perfil</a>
                        <a href="{{ route('posts.fav') }}" class="dropdown-item">
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
                    <h2 class="text-center">
                        <span class="float-left small">
                            <a href="{{ route('admin.categories') }}">
                                <i class="fa fa-caret-left text-dark"></i>
                            </a>
                        </span>
                        Editando Categoría: <em>{{ $category->nombre }}</em>
                    </h2>
                    <br>
                    <br>
                    <div class="container mt-3">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="container">
                                <div class="form-row">
                                    <div class="col my-2">
                                        <img src="{{asset($category->logo)}}" id="imagenCat" width="150px" height="150px" class="rounded-circle center-block">
                                        <br>
                                        <label for="logo" class="col-form-label">Logo</label>
                                        <input type="file" class="form-control p-1" name="logo" accept="image/*" id="logo">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="nom" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" value={{$category->nombre}} id="nom" required>
                                    </div>
                                </div>
                                <div class="form-row text-center mt-3">
                                    <div class="col">
                                        <input type="submit" value="Modificar" class="btn btn-info mr-2">
                                        <a href="{{ route('admin.categories') }}" class="btn btn-dark ml-2">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
