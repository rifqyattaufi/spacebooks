@extends('layouts.app-nonav')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 p-5 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 d-flex align-items-center justify-content-center">
            <div class="row">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/LOGO SPACEBOOK.png') }}" alt="Bootstrap" width="150px">
              </a>
              <div class="p-3 mt-5">
                <form method="POST" action="{{ route('login.authenticate') }}">
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
                  <button type="submit" class="btn btn-secondary text-light fw-bold w-100">Masuk</button>
                  <div class="fs-7 text-center mt-3">Belum punya akun? <a href="{{ route('register') }}"
                      class="fw-bold text-dark">Daftar</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 bg-primary p-5 right-side d-flex align-items-center justify-content-center">
      <div class="d-flex justify-content-center align-items-center">
      <img src="{{ asset('assets/images/spacerlog.png') }}" alt="Image" width="400px" class="img-fluid">
      </div>
    </div>
  </div>
</div>

@endsection
