<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Enlaces necesairos para la funcionalidad de la página-->
    <link href="{{asset('material/assets/css/material-kit.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('node_modules/animate.css/animate.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:500&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('img/icon.png')}}" sizes="80x80">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500&display=swap" rel="stylesheet">
    <script type="text/javascript" src="{{asset('sticker.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('titulo')</title>
</head>
<body>
    @yield('contenido')

    <!--Scripts necesarios para la funcionalidad de la página-->
    <script src="{{asset('material/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('material/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/material-kit.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
</body>
</html>