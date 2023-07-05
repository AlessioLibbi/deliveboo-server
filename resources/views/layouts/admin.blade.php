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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @vite(['resources/js/app.js'])
</head>
<style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        max-width: 600px;
        margin-top: 50px;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        margin-bottom: 10px;
    }

    .card-text strong {
        font-weight: bold;
    }

    .card-text a {
        color: #007bff;
        text-decoration: none;
    }
</style>
<body>
    <div id="app">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
            <div class="row justify-content-between">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Deliveboo</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="nav-item dropdown text-white">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </header>

        <div class="container-fluid " style="height: calc(100vh - 56px)">
            <div class="row h-100">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'restaurants.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('restaurants.show', Auth::id())}}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> My Restaurant
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 overflow-auto" style="height: calc(100vh - 56px)">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Warning!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Do you Want Delete this element<span id="product-name"></span>?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="action-delete" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const deleteBtns = document.querySelectorAll(".btn-delete");
        if (deleteBtns.length > 0) {
            deleteBtns.forEach((btn) => {
                btn.addEventListener("click", function(event) {
                    event.preventDefault();
                    const productName = btn.getAttribute("data-product-name");
                    const deleteModal = new bootstrap.Modal(document.getElementById("delete-modal"));
                    document.getElementById("product-name").innerText = productName;
                    document.getElementById("action-delete").addEventListener("click", function() {
                        btn.parentElement.submit();
                    });
                    deleteModal.show();
                });
            });
        }
    </script>
</body>
            
