<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/style.css'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            <div class="container-fluid">
                <div class="row">
                    <aside class="col-md-3 item1">
                        <div class="container mt-4">
                            <center>
                                <a href=""><img src="/logo.png" alt="" srcset="" width="50%" height="auto"></a>
                            </center>
                        </div>
                            <div class="mx-1 mt-2">
                                <ul class="nav flex-column">
                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-house-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Home</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-briefcase-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Empleos</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-people-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Personas</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-file-earmark-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Posts</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-envelope-at-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Curriculum</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="" class="nav-link font">
                                            <i class="bi bi-bell-fill"></i>
                                            &nbsp;&nbsp;&nbsp;<span>Notificaciones</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card text-white mb-3" style="margin-top: 20px;">
                                <div class="card-body">

                                </div>
                            </div>

                        </aside>
                        <div class="col-md-9 item2">
                        @if($message = Session::get('Mensaje'))
                            <div class="alert alert-success">
                                <ul>
                                    <h5>Confirmación:</h5>
                                    <span>{{ $message }}</span>
                                </ul>
                            </div>
                        @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
