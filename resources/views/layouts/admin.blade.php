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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
                        <aside class="col-md-3 item1" style="background-color: rgb(231, 231, 231); height:100vh;">
                            <div class="container mt-4">
                                <center>
                                    <a href="">Admin</a>
                                </center>
                            </div>
                            <div class="mx-1 mt-2">
                                <ul class="nav flex-column">
                                    <li class="nav-link">
                                        <a href="/admin/home" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Home</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="{{ route('admin.roles.index') }}" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Roles</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="{{route('admin.users.index')}}" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Usuarios</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="{{'COLOCAR ROL AQUI'}}" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Asignación de Usuarios</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="{{route('admin.companies.index')}}" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Empresas</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="{{route('admin.requests.index')}}" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Solicitud de Empresas</span>
                                        </a>
                                    </li>

                                    <li class="nav-link">
                                        <a href="#" class="nav-link font">
                                            &nbsp;&nbsp;&nbsp;<span>Administración de Categorías</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card text-white mb-3" style="margin-top: 20px;">
                                <div class=" black card-body">

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
