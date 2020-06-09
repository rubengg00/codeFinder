@extends('plantilla.plantilla')
@section('titulo')
Posts Favoritos
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
                @if (Auth::check() && $user->id == Auth::id())
                <li class="nav-item active mx-2">
                    <a class="nav-link" href="#">Mi Perfil <span class="sr-only">(current)</span></a>
                </li>
                @endif
                <li class="nav-item mx-2 dropdown nav-item inline-block d-none d-sm-none d-md-block " >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar Código <span class="sr-only">(current)</span></a>
                    <div class="dropdown-menu dropdown-menu-center">
                        <a href="{{ route('posts.buscador') }}" class="dropdown-item">Título</a>
                        <a href="{{ route('categorias.listado') }}" class="dropdown-item">Categoría</a>
                    </div>
                </li>
                <li class="dropdown nav-item inline-block d-none d-sm-none d-md-block" id="lista">
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
                <li class="dropdown nav-item inline-block d-block d-sm-block d-md-none" id="lista">
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
                <li class="nav-item mx-2 dropdown nav-item inline-block d-block d-sm-block d-md-none" >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Buscar Código <span class="sr-only">(current)</span></a>
                    <div class="dropdown-menu dropdown-menu-center">
                        <a href="{{ route('posts.buscador') }}" class="dropdown-item">Título</a>
                        <a href="{{ route('categorias.listado') }}" class="dropdown-item">Categoría</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="card" class="card border-0 shadow mb-4">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="row">
                        @if ($user->totalPosts() == 0)
                        <div class="col col-lg-3 col-sm-12 float-left">
                            <div id="perfil">
                                <img src="{{ asset($user->fotoPerfil) }}" id="foto" alt="Foto de {{ $user->username }}" width="215px" height="215px">
                                <h3 class="mx-auto font-weight-bold text-center">{{ $user->name }}</h3>
                                <h4 class="mx-auto font-weight-bold text-center"><small class="text-muted">{{ $user->username }}</small></h4>
                                <p class="mx-auto text-center">Se unió el <em>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</em></p>
                                @if (Auth::check() && $user->id == Auth::id())
                                <div class="col text-center">
                                    <a id="editPerfil" class="btn btn-dark btn-round text-center">Editar Perfl</a>
                                </div>
                                <div class="container mt-3">
                                    <form action="{{route('users.update',$user)}}" id="formPerfil" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <p class="text-center">Editando Perfil</p>
                                        <div class="form-row">
                                            <div class="col text-center">
                                                <img src="{{asset($user->fotoPerfil)}}" width="100px" height="100px" class="rounded-circle mb-1">
                                                <input type="file" class="form-control p-1" name="fotoPerfil" accept="image/*" id="fotoPerfil">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="name" class="col-form-label">Nombre</label>
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" required>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>No puedes dejar el nombre vacío.</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="username" class="col-form-label">Nickname</label>
                                                <input type="text" class="form-control" name="username" value="{{$user->username}}" id="username" required>
                                            </div>
                                            @error('username')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>Nombre de usuario inválido </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="email" class="col-form-label">E-mail</label>
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" required>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>Correo inválido </strong>
                                            </span>
                                            @enderror
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
                                @endif
                            </div>
                            <br>
                        </div>
                        @else
                        <div class="col col-lg-3 col-sm-12 float-left">
                            <div id="perfil">
                                <img src="{{ asset($user->fotoPerfil) }}" id="foto" alt="Foto de {{ $user->username }}" width="215px" height="215px">
                                <h3 class="mx-auto font-weight-bold text-center">{{ $user->name }}</h3>
                                <h4 class="mx-auto font-weight-bold text-center"><small class="text-muted">{{ $user->username }}</small></h4>
                                <p class="mx-auto text-center">Se unió el <em>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</em></p>
                                @if (Auth::check() && $user->id == Auth::id())
                                <div class="col text-center">
                                    <a id="editPerfil" class="btn btn-dark btn-round text-center">Editar Perfl</a>
                                </div>
                                <div class="container mt-3">
                                    <form action="{{route('users.update',$user)}}" id="formPerfil" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <p class="text-center">Editando Perfil</p>
                                        <div class="form-row">
                                            <div class="col text-center">
                                                <img src="{{asset($user->fotoPerfil)}}" width="100px" height="100px" class="rounded-circle mb-1">
                                                <input type="file" class="form-control p-1" name="fotoPerfil" accept="image/*" id="fotoPerfil">
                                            </div>
                                        </div>

                                        <p class="text-center text-danger" id="msgError1"></p>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="name" class="col-form-label">Nombre</label>
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name" required>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>No puedes dejar el nombre vacío.</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="username" class="col-form-label">Nickname</label>
                                                <input type="text" class="form-control" name="username" value="{{$user->username}}" id="username" required>
                                            </div>
                                            @error('username')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>Nombre de usuario inválido </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="email" class="col-form-label">E-mail</label>
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" required>
                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback text-center" role="alert">
                                                <strong>Correo inválido </strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-row text-center mt-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary btn-fab btn-fab-mini btn-round" data-toggle="modal" data-target="#modalContraseña">
                                                    <i class="fa fa-key"></i>
                                                </button>
                                                <a href="javascript:submitFormPerfil();" type="submit" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                                    <i class="material-icons">save</i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal fade" id="modalContraseña" tabindex="-1" role="">
                                    <div class="modal-dialog modal-login" role="document">
                                        <div class="modal-content">
                                            <div class="card card-signup card-plain">
                                                <div class="modal-body">
                                                    <form action="{{route('users.contraseña',$user)}}" method="POST" id="formContraseña">
                                                        @method('PUT')
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$user->id}}">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Cambio de contraseña</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="text-center text-danger" id="msgError"></p>
                                                            <div class="form-group bmd-form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">lock_outline</i>
                                                                    </span>
                                                                    <input id="password" type="password" placeholder="Contraseña..." class="form-control" name="password" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group bmd-form-group">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="material-icons">lock_outline</i>
                                                                    </span>
                                                                    <input id="password-confirm" type="password" placeholder="Repite Contraseña..." class="form-control" name="password_confirmation" required>
                                                                </div>
                                                            </div>
                                                            <div class="float-right mt-3">
                                                                <div class="input-group">
                                                                    <a href="javascript:submitFormContraseña();" type="submit" class="btn btn-primary">Cambiar contraseña</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <br>
                        </div>
                        <br>
                        <div class="col col-lg-9 mt-4">
                            <div>
                                <h4 class="text-center" id="encabezadoUsuario">
                                        <span class="font-weight-bold">Tus Posts Favoritos</span> 
                                    <span>
                                        <a class="float-right text-dark  mr-2" style="font-size:15px;" href="{{ route('users.show', $user) }}">Mis Posts</a>
                                    </span>
                                </h4>
                                @forelse ($posts as $item)
                                <div class="container" data-aos="fade-down">
                                    <div id="post" class="card-body shadow mb-5">
                                        <div class="col">
                                            <p id="fecha" class="text-center d-block d-sm-block d-md-none font-italic">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
                                            <h5>
                                                <span class="font-weight-bold"><a href="{{ route('posts.show', $item) }}" class="text-dark">{{ $item->titulo }}</a></span>
                                                <span class="float-right"><a href="{{ route('categorias.posts', $item->categoria) }}" class="text-info">{{ $item->categoria->nombre }}</a></span>
                                            </h5>
                                            <p class="font-italic">{{ $item->descripcion }}</p>
                                            <br>
                                            <p>
                                                <img id="fotoPost" src="{{ asset($item->user->fotoPerfil) }}" alt="Foto de Perfil de {{ $item->user->username }}" class="img-fluid rounded-circle mr-2" width="40px" height="60px">
                                                <span><a href="{{ route('users.show', $item->user) }}" class="text-dark">{{ $item->user->username }}</a></span>
                                                <span id="fecha" class="float-right font-italic d-none d-sm-none d-md-block ">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div class="container text-center mt-5 mr-3">
                                        <span></span>
                                        <h4>
                                            <em>No tienes guardado ningún post como favorito</em>
                                        </h4>
                                        <br>
                                        <h5>
                                            <a href="{{ route('posts.buscador') }}"><em>Mira los últimos posts </em></a>
                                        </h5>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer-main bg-dark py-5 small d-block d-sm-block">
    <div class="container d-none d-sm-none d-md-block">
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
    <div class="container d-block d-sm-block d-md-none text-center">
        Proyecto hecho con el Kit de UI
        <a href="https://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html">Material Kit</a>.
        <br>
        <div class="copyright text-center">
            &copy;
            <script>
                document.write(new Date().getFullYear())

            </script> CodeFinder, Inc.
        </div>
    </div>
</div>

@endsection
