@extends('layouts.app-nonav')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-2 bg-light">
                <div class="container p-5">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-center justify-content-center">
                            <div class="row">
                                <a class="navbar-brand" href="#">
                                    <img src="{{ asset('assets/images/LOGO SPACEBOOK.png') }}" alt="Bootstrap"
                                        width="150px">
                                </a>
                                <div class="p-3 mt-2">
                                    <form method="POST" action="{{ route('admin.login.authenticate') }}">
                                        @csrf
                                        <div class="h2 fw-bold mt-5">Selamat Datang Kembali!</div>
                                        <div class="fs-6 mb-5">Mohon isi kembali data anda</div>
                                        @error('error')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror()
                                        @if (session('success'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label fw-semibold">Email<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email">
                                            @error('email')
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label fw-semibold">Password<span
                                                    class="text-danger">*</span></label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror" id="password"
                                                name="password" data-toggle="password">
                                            @error('password')
                                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit"
                                            class="btn btn-secondary text-light fw-bold w-100">Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 bg-primary p-5 right-side d-flex align-items-center justify-content-center">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('assets/images/admin.png') }}" alt="Image" width="400px" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
