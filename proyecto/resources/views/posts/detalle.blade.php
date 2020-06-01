@extends('plantilla.plantilla')
@section('titulo')
{{ $post->titulo }}
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
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div id="divPosts" class="card border-0 shadow mb-4">
                <div class="shadow-lg p-3 mb-5 bg-white rounded">
                    @if (Auth::check() && $post->user_id == Auth::id())
                    <div>
                        <form name="borrar" method='post' action='{{route('posts.destroy', $post)}}'>
                            @csrf
                            @method('DELETE')
                            <span class="float-left ml-2" id="borrar">
                                <button type='submit' class="btn btn-outline-danger btn-fab btn-fab-mini btn-round" onclick="return confirm('¿Borrar post?')">
                                    <i class="material-icons">delete</i>
                                </button>
                            </span>
                            <h3 id="encabezadoPost" class="mx-auto font-weight-bold text-center">
                                {{ $post->titulo }}
                                <span class="float-right mr-2" id="editar">
                                    <a href="#" class="btn btn-outline-dark btn-fab btn-fab-mini btn-round">
                                        <i class="material-icons">edit</i>
                                    </a>
                                </span>
                            </h3>
                        </form>
                    </div>
                    @else
                    <h3 id="encabezado" class="mx-auto font-weight-bold text-center">{{ $post->titulo }}</h3>
                    @endif
                    <div class="d-block d-sm-block d-md-none">
                        <br>
                        <br>
                        <p>
                            <span class="font-italic">Publicado el {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                            <span class="float-right">
                                <i class="fa fa-eye"> {{ $post->visitas }}</i>
                            </span>
                        </p>
                    </div>
                    <div class="d-none d-sm-none d-md-block">
                        <p>
                            <span class="font-italic">Publicado el {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}</span>
                            <span class="float-right">
                                <i class="fa fa-eye"> {{ $post->visitas }}</i>
                            </span>
                        </p>
                    </div>
                    <hr>
                    <div id="editPost">
                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{$post->id}}">
                            <input type="hidden" name="user_id" value="{{\auth()->id()}}">
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" name="titulo" class="form-control" id="title" value="{{ $post->titulo }}" maxlength="80">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="descripcion" value="{{ old('descripcion') }}" rows="4" maxlength="180">{{ $post->descripcion }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="contenido">Código</label>
                                <textarea name="contenido" class="form-control" id="contenido" value="{{ old('contenido') }}" rows="14">
                                {{ $post->contenido }}
                                </textarea>
                            </div>
                            <div class="form-group pt-2 text-center">
                                <button type="submit" class="btn btn-dark btn-fab btn-fab-mini btn-round">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="transicion">
                        <p>
                            {{ $post->descripcion }}
                            <span class="float-right">
                                <button id="copiar" class="btn btn-primary btn-fab btn-fab-mini btn-round"  data-toggle="tooltip" data-html="true" title="<em>Copiar código</em>">
                                    <i class="material-icons">file_copy</i>
                                </button>
                            </span>
                        </p>
                        <br>
                        <pre id="codigo" class="overflow-auto"><code>{{ $post->contenido }}</code></pre>
                        <br>
                    </div>
                    <span class="ml-3" id="lenguaje">Lenguaje: </span>
                    <a href="{{ route('categorias.posts', $post->categoria) }}" class="badge badge-pill badge-default ml-3">{{ $post->categoria->nombre }}</a>

                    <p class="float-right mr-3" id="user">
                        Creado por <a class="font-italic" href="{{ route('users.show',$post->user) }}" data-toggle="tooltip" data-html="true" title="Posts: {{ $post->user->totalPosts()  }}">{{ $post->user->username }}</a>
                    </p>
                    <br>
                    <div class="text-center" id="fav">
                        @if ($post->isFavorited())
                            <form action="{{ route('posts.deleteFav', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-info btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-html="true" title="<em>Post guardado como favorito</em>" onclick="return confirm('¿Deseas borrar la publicación de tus favoritos?')">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('users.fav', $post) }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-info btn-fab btn-fab-mini btn-round" data-toggle="tooltip" data-html="true" title="<em>Guardar post como favorito</em>" onclick="return confirm('¿Deseas guardar la publicación como favorita?')">
                                    <i class="material-icons">favorite_border</i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div id="divMas" class="card border-0 shadow mb-4">
                <div class="card-body">
                    <h5 class="m-0">{{ $post->totalComments() }} comentarios en <b>"{{ $post->titulo }}" </b> </h5>
                    <hr>
                    {{-- Formulario para crear comentarios --}}
                    @include('comments.form')
                    <br>
                    {{-- Listar comentarios a través de list.blade.php --}}
                    @include('comments.list', ['comments' => $post->comments])
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div id="divPerfil" class="card border-0 shadow mb-4 d-lg-block">
                <div class="card-body">
                    <h3 class="text-center">Mi Perfil</h3>
                    <div class="text-center">
                        <img src="{{ asset(Auth::user()->fotoPerfil) }}" class="rounded-circle" width="100px" height="100px" />
                        <br><br>
                        <p><b>Nombre:</b> {{ Auth::user()->name }}</p>
                        <p><b>Usename:</b> {{ Auth::user()->username }}</p>
                        <p><b><a href="{{ route('users.show', Auth::user()) }}" class="text-dark">Mis posts:</a></b> {{ Auth::user()->totalPosts() }}</p>
                        <div class="text-center">
                            <div class="input-group text-center d-none d-sm-none d-md-block">
                                <a href="{{ route('posts.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" data-html="true" title="<em>Crea tus propias publicaciones</em>">Crea Posts</a>
                                
                            </div>
                            {{-- Para pantallas pequeñas --}}
                            <div class="input-group text-center d-block d-sm-block d-md-none" >
                                <a href="{{ route('posts.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="left" data-html="true" title="<em>Crea tus propias publicaciones</em>">Crea Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="divExtra" class="card border-0 shadow mb-4 text-center">
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

            <div id="divCarousel" class="card border-0 shadow mb-4 d-none d-sm-none d-lg-block">
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
                                    <a href="{{route('categorias.posts', 20)}}">
                                        <img class="d-block w-100" src="{{ asset('img/lenguajes/python.png') }}" alt="First slide" height="260px">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="{{route('categorias.posts', 1)}}">
                                        <img class="d-block w-100" src="{{ asset('img/lenguajes/php.png') }}" alt="Second slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="{{route('categorias.posts', 3)}}">
                                        <img class="d-block w-100" src="{{ asset('img/lenguajes/js.png') }}" alt="Third slide" height="250px">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a href="{{route('categorias.posts', 2)}}">
                                        <img class="d-block w-100" src="{{ asset('img/lenguajes/java.png') }}" alt="Forth slide" height="250px">
                                    </a>
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
<br><br>
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

<script>
    document.getElementById('copiar').addEventListener('click', copiarAlPortapapeles);

    function copiarAlPortapapeles()
    {
        var codigoACopiar = document.getElementById('codigo');
        var seleccion = document.createRange();
        seleccion.selectNodeContents(codigoACopiar);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(seleccion);
        var res = document.execCommand('copy');
        window.getSelection().removeRange(seleccion);

        $('#copiar').tooltip('hide').attr('data-original-title', '<em>Código copiado</em>').tooltip('show');
        
    }
</script>

@endsection
