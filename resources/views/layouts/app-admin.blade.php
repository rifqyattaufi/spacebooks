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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-primary min-vh-100">
                    <div class="d-flex flex-column align-items-center text-white pt-5">
                        <a href="/" class="pb-5">
                            {{-- <span class="fs-5 d-none d-sm-inline">Menu</span> --}}
                            <img src="{{ asset('assets/images/LOGO SPACEBOOK WHITE.png') }}" alt="Bootstrap"
                                width="150px" class="img-fluid">
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li
                                class="nav-item btn pe-3 ps-2 mb-2 @if (Route::currentRouteName() == 'admin.index') btn-secondary @endif">
                                <a href="{{ route('admin.index') }}" class="nav-link align-middle px-0 text-light">
                                    <img src="{{ asset('assets/images/dashIcon.png') }}" alt="Dashboard" width="20"
                                        class="me-2"><span class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li
                                class="nav-item btn pe-5 ps-2 mb-2 @if (Route::currentRouteName() == 'admin.jadwal') btn-secondary @endif">
                                <a href="{{ route('admin.jadwal') }}" class="nav-link align-middle px-0 text-light">
                                    <img src="{{ asset('assets/images/dateIcon.png') }}" alt="Jadwal" width="20"
                                        class="me-2"><span class="ms-1 d-none d-sm-inline">Jadwal</span>
                                </a>
                            </li>
                            <li
                                class="nav-item btn pe-5 ps-2 mb-2 @if (Route::currentRouteName() == 'admin.gallery') btn-secondary @endif">
                                <a href="{{ route('admin.gallery') }}" class="nav-link align-middle px-0 text-light">
                                    <img src="{{ asset('assets/images/galleryIcon.png') }}" alt="Gallery"
                                        width="20" class="me-2"><span
                                        class="ms-1 d-none d-sm-inline">Galery</span>
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
                        <div class="nav-item btn d-flex align-items-center pe-5 ps-2 mb-5">
                            <a href="{{ route('admin.logout') }}" class="nav-link align-middle px-0 text-light">
                                <img src="{{ asset('assets/images/logoutIcon.png') }}" alt="Logout" width="30"
                                    class="me-2">
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
    <div class="modal fade" id="successModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        Selamat Data Anda telah Disimpan
                    </div>
                    <button class="btn btn-secondary text-light" onclick="hideSuccess()">Selesai</button>
                </div>
            </div>
        </div>
    </div>
</body>
@yield('script')
<script>
    function hideSuccess() {
        $('#successModal').modal('hide');
    }
</script>

</html>
