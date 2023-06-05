@extends('layouts.app-nonav')

@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/LOGO SPACEBOOK.png') }}" alt="Bootstrap" width="150px">
        </a>
        <div class="row ">
            <div class="col-6 d-flex aligns-items-center justify-content-center">
                <div class="row">
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="h2 fw-bold">Selamat Datang</div>
                        <div class="fs-6">Ayo mulai mencari working space terbaik</div>
                        @error('error')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror ()
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-semibold">Nama lengkap<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name">
                            @error('name')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-semibold">Email address<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email">
                            @error('email')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Password<span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" data-toggle="password">
                            @error('password')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label fw-semibold">Konfirmasi password<span
                                    class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" data-toggle="password">
                        </div>
                        <button type="submit" class="btn btn-secondary text-light fw-bold w-100">Daftar</button>
                        <div class="fs-7 text-center">Sudah punya akun? <a href="{{ route('login') }}"
                                class="fw-bold text-dark">Masuk</a></div>
                    </form>
                </div>
            </div>
            <div class="col-6 d-flex aligns-items-center justify-content-center">

            </div>
        </div>
    </div>
@endsection
