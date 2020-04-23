@extends('layouts.app')
@section('titulo')
Admin | Posts
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
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="#">Posts <span class="sr-only">(current)</span></a>
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
                        <a href="{{ route('admin.index') }}" class="dropdown-item">Panel de Administrador</a>
                        <hr>
                        @endrole
                        <a href="#" class="dropdown-item">Perfil</a>
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
                    <h2 class="text-center">
                        <span class="float-left small">
                            <a href="{{ route('admin.index') }}">
                                <i class="fa fa-caret-left text-dark"></i>
                            </a>
                        </span>
                        Panel de Posts
                    </h2>
                    <br>
                    <div class="responsive" style="overflow-x:auto;">
                        <table id="listUsers" class="table table-hover text-center responsive ">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col">Creador</th>
                                    <th scope="col">Comentarios</th>
                                    <th scope="col">Visitas</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->titulo }}</td>
                                    <td>{{ $post->categoria->nombre }}</td>
                                    <td>{{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->totalComments() }}</td>
                                    <td>
                                        <i class="fa fa-eye"></i> {{ $post->visitas }}
                                    </td>
                                    <td>#</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$posts->appends(Request::except('page'))->links()}}
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
