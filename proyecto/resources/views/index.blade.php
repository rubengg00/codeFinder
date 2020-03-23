@extends('plantilla.plantilla')
@section('titulo')
    CodeFinder
@endsection
@section('contenido')
<nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CodeFinder</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">CodeFinder</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar Código</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lenguajes</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Perfil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Iniciar Sesión</a>
                            <a class="dropdown-item" href="#">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>

                <form class="form-inline ml-auto">
                    <div class="form-group no-border">
                        <input type="text" class="form-control" placeholder="Busca código">
                    </div>
                    <button type="submit" class="btn btn-white btn-just-icon btn-round">
                        <i class="material-icons">search</i>
                    </button>
                </form>
            </div>
        </div>
    </nav>


    <div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/programming.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                    <div class="brand text-center animated tada delay-1s">
                        <img src="{{asset('img/code.png')}}" width="100px" height="100px">
                        <h1 id="titulo">CodeFinder</h1>
                        <h3 class="title text-center" id="titulo" style="font-style: italic">Tu biblioteca de código</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <div class="flow-lg-row">
                    <p class="h1 text-center my-2 font-italic">Encuentra. Comparte. Guarda</p>
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">
                            CodeFinder es un portal web creado y diseñado para los programadores. Creado por un alumno
                            del grado Desarrollo de Aplicaciones Web, esta aplicación intenta servir de ayuda tanto, a 
                            programadores que acaban de empezar en el gremio, como a los más veteranos. 
                        </p>
                    </blockquote>
            </div>
        </div>
    </div>
    

    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">
                <ul>
                    <li>
                        <a href="https://github.com/RubenGarciaGonzalez">
                            Ruben Garcia 
                        </a>
                    </li>
                </ul>
            </nav>
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