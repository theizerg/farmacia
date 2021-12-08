<!DOCTYPE html>
<html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sisventas - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <!-- General CSS Files -->

    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/system.css') }}">
    <link rel="icon" href="{{ asset('images/logo/logo-imagen.png') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('img/favicon.ico') }}' />
    @stack('styles')
  </head>

  <body class="hold-transition login-page" id="body">
    <!--Page Content Here -->
    @yield('content')

    <!-- REQUIRED JS SCRIPTS -->
     <!-- General JS Scripts -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/system.js')}}"></script>
    @stack('scripts')

    <style>
         #body{

          background-image: url("{{asset('/images/fondo/fondo_pagina.png') }}");    
          background-repeat: repeat;
          background-position: 30px;
    
        }
    </style>
  </body>

</html>
