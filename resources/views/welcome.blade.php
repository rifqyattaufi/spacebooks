@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row align-items-center p-0">
                <div class="col-lg-6 py-5 px-4 order-md-1 order-md-2">
                    <h2 class="fw-bold lh-base">Memudahkan Anda dalam menemukan dan reservasi Coworking Space</h2>
                    <p class="fw-light my-2">Menyediakan info terlengkap seputar Coworking Space di wilayah Anda</p>
                    <a href="{{ '/caritempat' }}" class="btn btn-secondary text-white ps-5 pe-5 my-3">Cari Tempat</a>
                </div>
                <div class="col-lg-6 py-5 px-4 order-md-2 order-md-1">
                    <img src="{{ asset('assets/images/banner.png') }}" alt="Spacebook" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <h3 class="text-left mb-5 fw-bold">Terpopuler</h3>
            <div class="row">

                @foreach ($data as $d)
                    <div class="col-lg-4">
                        <div class="card mb-4 shadow p-3">

                            <img src="{{ asset('assets/images/image1.png') }}" class="card-img-top" alt="Card Image">
                            <div class="card-body">

                                <h5 class="card-title">EZO Working Space</h5>

                                <p class="card-text">Coworking Space</p>

                                <p class="card-text">Rp.50rb - 150rb/h</p>

                                <div class="rating">
                                    <span class="text-warning">&#9733;</span>
                                    <span class="text-warning">&#9733;</span>
                                    <span class="text-warning">&#9733;</span>
                                    <span class="text-muted">&#9733;</span>
                                    <span class="text-muted">&#9733;</span>
                                    <span class="text-muted rating-text mr-2">322 reviews</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <a href="{{ '/detailtempat' }}" class="btn btn-secondary text-white mt-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                {{-- <div class="col-lg-4">
                    <div class="card mb-4 shadow p-3">

                        <img src="{{ asset('assets/images/image2.png') }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">

                            <h5 class="card-title">Ngalup Co</h5>

                            <p class="card-text">Coworking Space</p>

                            <p class="card-text">Rp.50rb - 150rb/h</p>

                            <div class="rating">
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-muted">&#9733;</span>
                                <span class="text-muted rating-text mr-2">322 reviews</span>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-secondary text-white mt-3">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4 shadow p-3">

                        <img src="{{ asset('assets/images/image3.png') }}" class="card-img-top" alt="Card Image">
                        <div class="card-body">

                            <h5 class="card-title">Ruang Milenial</h5>

                            <p class="card-text">Coworking Space</p>

                            <p class="card-text">Rp.50rb - 150rb/h</p>

                            <div class="rating">
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-warning">&#9733;</span>
                                <span class="text-muted rating-text mr-2">322 reviews</span>
                            </div>

                            <div class="d-grid gap-2">
                                <a href="#" class="btn btn-secondary text-white mt-3">Detail</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="p-4">
        <div class="container">
            <h2 class="text-center mb-5">Layanan Kami</h2>
            <div class="row">

                <div class="col-md-4">
                    <div class="card mb-4 border-0">
                        <div class="card-body text-center">
                            <image src="{{ asset('assets/images/icon1.png') }}" alt="Booking Tempat" class="img-fluid mb-4">
                                <h5 class="card-title">Booking Tempat</h5>
                                <p class="card-text">Cari Coworking space sesuai kebutuhan dan booking tempat lebih cepat.
                                </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 border-0">
                        <div class="card-body text-center">
                            <image src="{{ asset('assets/images/icon2.png') }}" alt="Tambah Tempat" class="img-fluid mb-4">
                                <h5 class="card-title">Tambah Tempat</h5>
                                <p class="card-text">Tambahkan Coworking spacemu agar muncul pada fitur cari tempat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card mb-4 border-0">
                        <div class="card-body text-center">
                            <image src="{{ asset('assets/images/icon3.png') }}" alt="Kuota Terupdate"
                                class="img-fluid mb-4">
                                <h5 class="card-title">Kuota Terupdate</h5>
                                <p class="card-text">Kuota working space akan selalu terupdate tiap terjadi reservasi pada
                                    website.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="p-2">
        <div class="container bg-primary text-white rounded p-0 d-flex justify-content-center">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/tentangKami.png') }}" alt="Spacebook" class="img-fluid">
                </div>
                <div class="col-md-6 p-5">
                    <img src="{{ asset('assets/images/LOGO SPACEBOOK WHITE.png') }}" class="mb-4" alt="Bootstrap"
                        width="170.04px" height="66.53px">
                    <h2 class="fw-bold lh-base">Apa itu Spacebook</h2>
                    <h5 class="fw-light lh-lg mt-3">SpaceBook adalah platform yang menyediakan informasi terlengkap
                        mengenai coworking space/meeting room sehingga reservasi ruangan menjadi lebih mudah</h5>
                </div>
            </div>
        </div>
    </section>

    <section class="p-2">
        <div class="container p-5 d-flex justify-content-center">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb-4 shadow">
                        <div class="card-body">
                            <div class="row p-5">
                                <div class="col-lg-6">
                                    <h2 class="fw-bold lh-base">Ingin menambahkan coworking spacemu?</h2>
                                    <p class="fw-light my-2">Daftarkan coworking spacemu di sini</p>
                                    <a href="{{ route('register') }}"
                                        class="btn btn-secondary text-white ps-5 pe-5 my-3">Hubungi Kami</a>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <img src="{{ asset('assets/images/CTA.png') }}" alt="Spacebook" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-primary text-white py-5">
        <div class="container">
            <h2 class="text-center mb-5">Apa kata mereka tentang SpaceBook?</h2>
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="card bg-white text-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture"
                                        class="rounded-circle mb-3" width="80" height="80">
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">John Doe</h5>
                                    <div class="rating-stars">
                                        <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat
                                sesuai kebutuhan”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-white text-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture"
                                        class="rounded-circle mb-3" width="80" height="80">
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">John Doe</h5>
                                    <div class="rating-stars">
                                        <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat
                                sesuai kebutuhan”</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card bg-white text-primary">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture"
                                        class="rounded-circle mb-3" width="80" height="80">
                                </div>
                                <div class="col-8">
                                    <h5 class="card-title">John Doe</h5>
                                    <div class="rating-stars">
                                        <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat
                                sesuai kebutuhan”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
