@extends('layouts.app-nonav')

@section('content')
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/images/LOGO SPACEBOOK.png') }}" alt="Bootstrap" width="150px">
        </a>
        <div class="row ">
            <div class="col-6 d-flex aligns-items-center justify-content-center">
                <div class="row">
                    <form method="POST" action="{{ route('admin.register.store') }}">
                        @csrf
                        <div class="h2 fw-bold">Selamat Datang</div>
                        <div class="fs-6">Ayo mulai mencari working space terbaik</div>
                        @error('error')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror ()
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
                        <div class="fs-7 text-center">Sudah punya akun? <a href="{{ route('admin.login') }}"
                                class="fw-bold text-dark">Masuk</a></div>
                    </form>
                </div>
            </div>
            <div class="col-6 d-flex aligns-items-center justify-content-center">

            </div>
        </div>
    </div>
@endsection