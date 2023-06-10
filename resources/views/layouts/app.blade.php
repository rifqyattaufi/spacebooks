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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                            <a class="nav-link active" href="{{ '/' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/caritempat' }}">Cari Tempat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ '/tambahtempat' }}">Tambah Tempat</a>
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
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture" class="rounded-circle" width="60" height="60">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    </a>
                                    
                                    <div class="dropdown-menu dropdown-menu-end p-0 m-0" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item p-0 m-0"href="{{ route('logout') }}">
                                            <div class="card d-flex flex-column">
                                                <div class="card-body">
                                                    <div class="col">
                                                        {{ Auth::user()->name }}
                                                    </div>
                                                    <div class="col">
                                                        {{ Auth::user()->email }}
                                                    </div>
                                                </div>
                                                <div class="card-footer text-secondary">
                                                    <a href="#" class="text-decoration-none fw-bold lh-lg text-primary mb-3">Bookingan Saya</a  >
                                                    {{ __('Logout') }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')

                        
            <section class="p-5">
                <div class="container">

                </div>
            </section>

            <footer class="bg-primary text-white py-5 m-auto">
            <div class="container">
                <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('assets/images/LOGO SPACEBOOK WHITE.png') }}" alt="Logo" class="mb-3" width="100">
                    <p class="mb-4">Kerja jadi lebih mudah dan nyaman, booking ga perlu ribet lagi.</p>
                    <div class="social-icons">
                    <span class="follow-text">Follow Us:</span>
                    <a href="#" class="text-decoration-none"><img src="{{ asset('assets/images/Instagram.png') }}" alt="Instagram"></a>
                    <a href="#" class="text-decoration-none"><img src="{{ asset('assets/images/Facebook.png') }}" alt="Facebook"></a>
                    <a href="#" class="text-decoration-none"><img src="{{ asset('assets/images/Linkedin.png') }}" alt="LinkedIn"></a>
                    <a href="#" class="text-decoration-none"><img src="{{ asset('assets/images/Whatsapp.png') }}" alt="WhatsApp"></a>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-3">Tentang</h5>
                    <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Perusahaan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-3">Produk</h5>
                    <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Ringkasan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Fitur</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-3">Bantuan</h5>
                    <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Syarat dan Ketentuan</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Kebijakan Pribadi</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <p class="mt-4">Copyright&copy; 2023 SpaceBook. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            </footer>
        </main>
    </div>
</body>

</html>
