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

    <!-- Vite Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('statedmaster') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" href="{{ asset('statedmaster') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('statedmaster') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('statedmaster') }}/css/style.css">
    @stack('styles')
</head>

<body>
    <div id="app">
        <!-- Header / Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Data Bengkel</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('pelanggan_index') }}">Data Pelanggan</a></li>
                                <li><a class="dropdown-item" href="{{ route('pelanggan_create') }}">Tambah Pelanggan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route('mekanik_index') }}">Data Mekanik</a></li>
                                <li><a class="dropdown-item" href="{{ route('mekanik_create') }}">Tambah Mekanik</a></li>
                                <li><a class="dropdown-item" href="{{ route('manager_index') }}">Data Manager</a></li>
                                <li><a class="dropdown-item" href="{{ route('manager_create') }}">Tambah Manager</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Laporan</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('manager_laporan') }}">Laporan Manager</a></li>
                                <li><a class="dropdown-item" href="{{ route('mekanik_laporan') }}">Laporan Mekanik</a></li>
                                <li><a class="dropdown-item" href="{{ route('pelanggan_laporan') }}">Laporan Pelanggan</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <!-- Main Content -->
        <main class="py-4">
            @if (Session::has('pesan'))
            <div class="alert alert-{{ Session::get('alert-type', 'primary') }}" role="alert">
                {{ Session::get('pesan') }}
            </div>
            @endif
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer bg-light text-center py-3">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All Rights Reserved.</p>
        </footer>
    </div>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>
