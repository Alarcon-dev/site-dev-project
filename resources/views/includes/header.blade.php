<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Site dev &mdash; Project</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/style.css', 'resources/js/code.js'])
    <!-- Code mirror js-->
    <!-- Incluir CSS de CodeMirror -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.css">

    <!-- Incluir JavaScript de CodeMirror -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/codemirror.min.js"></script>

    <!-- Incluir modos específicos de CodeMirror si los necesitas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/mode/javascript/javascript.min.js"></script>
    <!-- Agrega más modos según sea necesario -->

    <!-- Opcional: Incluir temas adicionales de CodeMirror -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.63.1/theme/monokai.min.css">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @guest
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar mr-5 mt-3">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">SITE DEV</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            @else
                <div class="navbar-bg"></div>
                <nav class="navbar navbar-expand-lg main-navbar">
                    <form class="form-inline mr-auto">
                        <ul class="navbar-nav mr-3">
                            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                        class="fas fa-bars"></i></a></li>
                            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                        class="fas fa-search"></i></a></li>
                        </ul>
                        <div class="search-element">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                data-width="250">
                            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                            <div class="search-backdrop"></div>
                        </div>
                    </form>
                    <ul class="navbar-nav navbar-right">
                        @role('admin')
                            @include('includes.is_admin')
                        @endrole
                        @role('userClient')
                            @include('includes.is_user')
                        @endrole
                    </ul>
                </nav>
            @endguest
