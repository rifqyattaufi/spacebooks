@extends('layouts.app')

@section('content')
    <section class="bg-primary text-white">
        <div class="container">
            <div class="row align-items-center p-0">
                <div class="col-lg-6 py-5 px-4 order-md-1 order-md-2">
                    <h2 class="fw-bold lh-base">Cari info lengkap mulai dari harga hingga fasilitas</h2>
                    <p class="fw-light my-2">SpaceBook hadir sebagai platform dengan informasi terlengkap</p>
                </div>
                <div class="col-lg-6 py-5 px-4 order-md-2 order-md-1">
                    <img src="{{ asset('assets/images/caribanner.png') }}" alt="Spacebook" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <h3 class="text-left fw-bold">Hasil</h3>
            <p>Menampilkan {{ count($spaces) }} hasil</p>
            <div class="row mb-5 d-flex justify-content-between align-items-center">
                <div class="col-lg-8">
                    <a class="btn btn-secondary text-light ps-5 pe-5" href="#">Coworking Space</a>
                    <a class="btn btn-outline-secondary ps-5 pe-5" href="#">Meeting Room</a>
                </div>
                <div class="col-lg-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <img src="{{ asset('assets/images/searchIcon.png') }}" alt="Search" width="20">
                        </span>
                        <input type="text" class="form-control" style="border-left: none;" placeholder="Search">
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($spaces as $s)
                    <div class="col-lg-4">
                        <div class="card mb-4 shadow p-3">
                            <img src="{{ url('/images/', $s->image) }}" class="card-img-top" alt="Card Image"
                                style="object-fit: cover; aspect-ratio: 16/9">
                            <div class="card-body">

                                <h5 class="card-title">{{ $s->name }}</h5>

                                <p class="card-text">
                                    @if ($s->coworking_price != null)
                                        Coworking Space
                                    @endif
                                </p>

                                <p class="card-text">
                                    @if ($s->coworking_price > $s->meeting_price && $s->meeting_price != null)
                                        Rp.{{ number_format($s->meeting_price) }} -
                                        {{ number_format($s->coworking_price) }}/h
                                    @elseif ($s->coworking_price < $s->meeting_price && $s->coworking_price != null)
                                        Rp.{{ number_format($s->coworking_price) }} -
                                        {{ number_format($s->meeting_price) }}/h
                                    @elseif ($s->coworking_price != null)
                                        Rp.{{ number_format($s->coworking_price) }}/h
                                    @elseif ($s->meeting_price != null)
                                        Rp.{{ number_format($s->meeting_price) }}/h
                                    @endif
                                </p>

                                <div class="rating">
                                    @for ($i = 0; $i < $s->rating; $i++)
                                        <span class="text-warning">&#9733;</span>
                                    @endfor
                                    @for ($i = $s->rating; $i < 5; $i++)
                                        <span class="text-muted">&#9733;</span>
                                    @endfor
                                    <span class="text-muted rating-text mr-2">{{ $s->count }} reviews</span>
                                </div>

                                <div class="d-grid gap-2">
                                    <a href="{{ route('detailtempat', $s->id) }}"
                                        class="btn btn-secondary text-white mt-3">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!--pagination from controller-->
                <div class="col-md-12">
                    {{ $spaces->links('vendor.pagination.custom') }}
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
                                    <a href="#" onclick="adminModal()"
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
@endsection
