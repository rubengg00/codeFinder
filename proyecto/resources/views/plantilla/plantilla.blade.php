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
    <link rel="icon" href="{{asset('img/code.png')}}" sizes="64x64">
    <script type="text/javascript" src="{{asset('sticker.min.js')}}"></script>
    <title>@yield('titulo')</title>
</head>
<body>
    @yield('contenido')

    <!--Scripts necesarios para la funcionalidad de la página-->
    <script src="{{asset('material/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('material/assets/js/plugins/moment.min.js')}}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('material/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('material/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <!--  Google Maps Plugin  -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('material/assets/js/material-kit.js')}}" type="text/javascript"></script>
</body>
</html>