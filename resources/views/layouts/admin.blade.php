<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ Vite::asset('resources/img/favicon.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
            <div class="row justify-content-between">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">BoolPress</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap ms-2">
                    <p id="capo" class="d-inline-block mx-4"> {{ Auth::user()->name }}</p>
                    <a class="nav-link d-inline-block" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw mx-2 "
                                        style="color: rgb(45, 243, 0);"></i> Dashboard
                                </a>
                            </li>

                            <li class="nav-item text-white">
                                - Panoramica ristorante
                                {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.projects.index') }}">
                                    <i class="fa-regular fa-folder-open mx-2"  style="color: rgb(151, 71, 255);"></i> Projects
                                </a> --}}
                            </li>
                            <li class="nav-item text-white">
                                - Controlla il tuo menu
                                {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.projects.create') }}">
                                    <i class="fa-solid fa-circle-plus mx-2"  style="color: rgb(5, 225, 240);"></i> Crea uno nuovo Progetto
                                </a> --}}
                            </li>
                            <li class="nav-item text-white">
                                - controlla o modifica tipologia di cucina del tuo ristorante
                                {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.types.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.types.create') }}">
                                    <i class="fa-solid fa-circle-plus mx-2"  style="color: rgb(5, 225, 240);"></i> Inserisci nuovo TIPO
                                </a> --}}
                            </li>
                            <li class="nav-item text-white">
                                - Controlla gli ordini dei clienti
                                {{-- <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.types.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.types.index') }}">
                                    <i class="fa-regular fa-folder-open mx-2"  style="color:  rgb(151, 71, 255);"></i> Lista dei TIPI
                                </a> --}}
                            </li>

                            <li class="nav-item text-white">
                                <a href=""> CREA NUOVO RISTORANTE </a>
                                ... (22 righe a disposizione)
