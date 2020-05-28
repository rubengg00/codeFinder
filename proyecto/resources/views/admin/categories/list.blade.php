@extends('plantilla.plantilla')
@section('titulo')
Admin | Categorias
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
                        <a class="nav-link" href="#">Categorias <span class="sr-only">(current)</span></a>
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
                            <a href="{{ route('admin.index') }}">
                                <i class="fa fa-caret-left text-dark"></i>
                            </a>
                        </span>
                        Panel de Categorias

                    </h2>
                    <br>
                    <br>
                    <div class="responsive" style="overflow-x:auto;">
                        <table id="listCategory" class="table table-hover text-center responsive ">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Lenguaje</th>
                                    <th>Posts</th>
                                    <th>Logo</th>
                                    <th>Acciones</th>
                                </tr>
                            <tbody>
                                @foreach ($categorias as $item)
                                <tr>
                                    <td class="align-middle"><a href="{{ route('categorias.posts', $item) }}" class="text-dark"> {{ $item->nombre }}</a></td>
                                    <td class="align-middle">{{ $item->totalPosts() }}</td>
                                    <td class="align-middle"><img src="{{ asset($item->logo) }}" alt="{{ $item->nombre }}" width="80px" height="75px"></td>
                                    <td class="align-middle" style="white-space: nowrap">
                                        <form name="borrar" method='post' action='{{ route('admin.categories.destroy',$item) }}'>
                                            @csrf
                                            @method('DELETE')
                                            <a id="editCat" href="{{ route('admin.categories.edit', $item) }}" class="btn btn-info text-center">Editar</a>
                                            <button type='submit' class="btn btn-danger" onclick="return confirm('¿Borrar categoría?')">
                                                Borrar</button>
                                        </form>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                        {{$categorias->appends(Request::except('page'))->links()}}
                        <br>
                        <div class="col text-center">
                            <a  id="create" class="btn btn-dark btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-placement="bottom" title="Crea una nueva categoría">
                                <i class="material-icons">add</i>
                            </a>
                        </div>
                        <div id="formCategoria" class="container">
                            <form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6 class="text-center">Creación de categoría nueva</h6>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control p-1" name="logo" accept="image/*" id="fotoPerfil">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="nombre" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Nombre..." id="name" required>
                                    </div>
                                </div>
                                <div class="form-row text-center mt-3">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                                <i class="fa fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-main bg-dark py-5 small d-block d-sm-block">
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
