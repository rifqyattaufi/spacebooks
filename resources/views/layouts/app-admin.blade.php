<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/images/LOGO SPACEBOOK.png') }}" alt="Bootstrap" width="170.04px"
                        height="66.53px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <ul class="navbar-nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cari Tempat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tambah Tempat</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item me-2">
                                    <a class="btn btn-secondary text-light ps-5 pe-5" href="{{ route('login') }}">Masuk</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-secondary ps-5 pe-5" href="{{ route('register') }}">Daftar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary min-vh-100">
                    <div class="d-flex flex-column align-items-center text-white pt-5">
                        <a href="/" class="pb-5">
                            {{-- <span class="fs-5 d-none d-sm-inline">Menu</span> --}}
                            <img src="{{ asset('assets/images/LOGO SPACEBOOK WHITE.png') }}" alt="Bootstrap" width="150px" class="img-fluid">
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item btn btn-secondary pe-3 ps-2 mb-2">
                                <a href="{{ route('admin.index') }}" class="nav-link align-middle px-0 text-light">
                                    <img src="{{ asset('assets/images/dashIcon.png') }}" alt="Dashboard" width="20" class="me-2"><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                             <li class="nav-item btn pe-5 ps-2 mb-2 "> <!--  btn-secondary-->
                             <a href="{{ route('admin.jadwal') }}" class="nav-link align-middle px-0 text-light">
                                 <img src="{{ asset('assets/images/dateIcon.png') }}" alt="Jadwal" width="20" class="me-2"><span class="ms-1 d-none d-sm-inline">Jadwal</span>
                                </a>
                            </li>
                            <li class="nav-item btn pe-5 ps-2 mb-2">  <!--  btn-secondary  -->
                            <a href="{{ route('admin.gallery') }}" class="nav-link align-middle px-0 text-light">
                                <img src="{{ asset('assets/images/galleryIcon.png') }}" alt="Gallery" width="20" class="me-2"><span class="ms-1 d-none d-sm-inline">Galeri</span>
                            </a>
                            </li>
                        </ul>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                        <div class="nav-item btn btn-danger d-flex align-items-center pe-5 ps-2 mb-5">
                            <a href="{{ route('admin.logout') }}" class="nav-link align-middle px-0 text-light">
                                <img src="{{ asset('assets/images/logoutIcon.png') }}" alt="Logout" width="30" class="me-2">
                                <span class="ms-1 d-none d-sm-inline">Keluar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col py-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
@yield('script')

</html>
