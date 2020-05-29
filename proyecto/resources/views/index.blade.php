@extends('plantilla.plantilla')
@section('titulo')
CodeFinder
@endsection
@section('contenido')
<nav id="navbarHome" class="navbar navbar-inverse navbar-expand-lg bg-dark fixed-top " role="navigation-demo">
    <div class="container">
        <a class="navbar-brand">
            <div class="logo-small">
                <img src="{{asset('img/code.png')}}" width="25px" height="25px" class="img-fluid">
            </div>
        </a>
        <a class="navbar-brand" href="{{ route('index') }}">CodeFinder</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">CodeFinder</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{route('login')}}">Iniciar Sesión</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('register') }}">Registrarse </a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/background.jpg')}}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand text-center animated fadeIn delay-1s">
                    <img src="{{asset('img/boceto_copia.png')}}" width="320px" height="380px">
                    <h1 id="titulo">CodeFinder</h1>
                    <h3 class="title text-center" id="titulo" style="font-style: italic">Tu biblioteca de código</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised ">
    <div class="container">
        <br>
        <div class="flow-lg-row" id="textoIndex">
            <br>
            <p class="h1 text-center my-2 font-italic">Busca. Pregunta. Guarda</p>
            <blockquote class="blockquote text-center" data-aos="fade-down">
                <p class="mb-0">
                    CodeFinder es un portal web creado y diseñado para los programadores. Aquí, podrás buscar
                    códigos de aplicaciones de usuarios, para poder implementarlos en tus proyectos, e incluso
                    guardarlos como favoritos, para acceder a ellos de una forma más sencilla.
                </p>
            </blockquote>
        </div>
        <div class="text-center flow-lg-row">
            <div class="row">
                <div class="col-md-4" data-aos="fade-down">
                    <div class="info">
                        <div class="icon icon-info">
                            <i class="material-icons">library_books</i>
                        </div>
                        <h4 class="info-title">Crea tus publicaciones</h4>
                        <p>
                            Comparte tus códigos al igual que el resto de usuarios de la plataforma.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="info">
                        <div class="icon icon-primary">
                            <i class="material-icons">search</i>
                        </div>
                        <h4 class="info-title">Encuentra códigos</h4>
                        <p>
                            Búsca el código que quieras entre todos los lenguajes disponibles en el portal.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-down">
                    <div class="info">
                        <div class="icon icon-danger">
                            <i class="material-icons">favorite</i>
                        </div>
                        <h4 class="info-title">Guarda tus favoritos</h4>
                        <p>
                            Guarda tus publicaciones favoritas para no perderlas nunca de vista.
                        </p>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <h3 class="title text-center" data-aos="fade-down">Creador del portal</h3>
        <div class="team text-center" data-aos="fade-down">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="team-player">
                        <div class="card card-plain">
                            <div class="col-md-6 ml-auto mr-auto">
                                <img src="{{ asset('img/perfil.png') }}" alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                            </div>
                            <h4 class="card-title">Rubén García
                                <br>
                                <small class="card-description text-muted">Desarrollador de Aplicaciones Web</small>
                            </h4>
                            <div class="card-body">
                                <p class="card-description">
                                    Soy un estudiante del grado superior de Desarrollo de Aplicaciones Web, realizado en el instituto IES Al-Ándalus en Almería. 
                            </div>
                            <div class="card-footer justify-content-center">
                                <a href="https://github.com/RubenGarciaGonzalez" target="_blank" class="btn btn-link btn-just-icon"><i class="fa fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer footer-default col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
