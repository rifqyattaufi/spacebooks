@extends('layouts.app')

@section('content')
    <section class="my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <div class="d-flex align-items-center mb-5">
                        <a href="javascript:history.back()"
                            class="text-decoration-none d-flex flex-row justify-content-center align-items-center">
                            <img src="{{ asset('assets/images/backIcon.png') }}" alt="Back" width="20">
                            <h4 class="ms-2 my-0">Back</h4>
                        </a>
                    </div>
                    <div class="container-fluid mt-5">
                        <div class="row flex-nowrap overflow-auto align-items-center justify-content-center">
                            @foreach ($images as $i)
                                <div class="col-lg-4 mb-4">
                                    <img src="{{ url('/images/', $i->image) }}" class="card-img-top" alt="Image 1"
                                        style="aspect-ratio:16/9; object-fit: cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <h1 class="text-left fw-bold">{{ $space->name }}</h1>
            @if ($type == 'meeting')
                <h3>Meeting Room</h3>
            @else
                <h3>Coworking Space</h3>
            @endif

            <div class="row mt-5">
                <div class="col-lg-12">
                    <h4 class="fw-bold">Opening Hours</h4>
                    <div class="row align-items-center justify-content-center">
                        @for ($i = $start; $i <= $end; $i++)
                            <div class="col-lg-1 text-center ms-5">
                                <h5>{{ $week[$i] }}</h5>
                                <h5>{{ $date[$i] }}</h5>
                                @for ($j = Carbon\Carbon::parse($space->open_time); $j <= Carbon\Carbon::parse($space->close_time); $j->addHour())
                                    <button
                                        class="btn btn-sm mb-2 rounded @if (in_array($j->format('H:i:s'), $jadwal[$i])) btn-danger @else btn-success @endif">
                                        {{ $j->format('H:i') }}
                                    </button>
                                @endfor
                            </div>
                        @endfor
                    </div>
                </div>
                <h4 class="mt-2">
                    <a href="" class="btn btn-sm btn-success text-success rounded my-0">--</a>
                    Tersedia
                </h4>
                <h4 class="mt-2">
                    <a href="" class="btn btn-sm btn-danger text-danger rounded my-0">--</a>
                    Tidak Tersedia
                </h4>
                <div class="col-lg-12 mt-4 d-flex justify-content-center">
                    <a href="#" class="btn btn-secondary ps-5 pe-5 text-white rounded"
                        onclick="reserveModal()">Reservasi</a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <h3 class="fw-bold">Harga</h3>
                    <h5>Coworking Space</h5>
                    <p class="m-0">Rp{{ number_format($space->coworking_price) }}</p>
                    <h5 class="mt-2">Meeting Room</h5>
                    <p class="m-0">Rp{{ number_format($space->meeting_price) }}</p>
                </div>
                <div class="col-lg-3">
                    <h3 class="fw-bold">Jam Buka</h3>
                    <h5>Monday - Friday</h5>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/clockIcon.png') }}" alt="Clock" width="20" class="me-2">
                        <span>{{ date('H:i', strtotime($space->open_time)) }} -
                            {{ date('H:i', strtotime($space->close_time)) }}</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h3 class="fw-bold">Fasilitas</h3>
                    @foreach ($facilitys as $f)
                        <p class="m-0">{{ $f->name }}</p>
                    @endforeach
                </div>
                <div class="col-lg-3">
                    <h3 class="fw-bold">Kapasitas</h3>
                    <p class="m-0">Coworking Space</p>
                    <p class="m-0">25 orang</p>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="fw-bold">Lokasi</h3>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/pinIcon.png') }}" alt="Location" width="20" class="me-2">
                        <h4 class="m-0">Jl. Dewandaru No.68, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="fw-bold d-flex align-items-center">
                        Review
                        @guest
                        @else
                            <img src="{{ asset('assets/images/addIcon.png') }}" alt="Review Icon" width="40"
                                class="ms-2 hover_tunjuk" onclick="ratingModal()">
                        @endguest
                    </h3>
                </div>
                <div class="col-lg-12">
                    <div class="row mt-5">
                        @foreach ($reviews as $r)
                            <div class="col-md-6 mb-4">
                                <div class="card border-0 text-primary">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h5 class="card-title mb-0 text-capitalize">{{ $r->name }}</h5>
                                                <div class="rating-stars">
                                                    @for ($i = 0; $i < $r->rating; $i++)
                                                        <span class="text-warning">&#9733;</span>
                                                    @endfor
                                                    @for ($i = $r->rating; $i < 5; $i++)
                                                        <span class="text-muted">&#9733;</span>
                                                    @endfor
                                                </div>
                                                <p class="card-text mt-2 text-break">“{{ $r->comment }}”</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="reserveModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row d-flex justify-content-center text-center">
                            <div class="col mb-4">
                                <img src="{{ asset('assets/images/logoWA.png') }}" alt="WhatsApp Icon" class="img-fluid"
                                    width="40%">
                            </div>
                            <h5 class="mb-2">{{ $space->phone }}</h5>
                            <h5 class="mb-2">Admin {{ $space->phone }}</h5>
                            <h5 class="mb-3">Silakan melakukan pemesanan di WA</h5>
                            <div>
                                <a href="https://wa.me/{{ $space->phone }}"
                                    class="btn btn-secondary text-white px-5">Hubungi
                                    Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ratingModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col mb-1">
                                <h1 class="text-left fw-bold">Rating Anda</h1>
                            </div>
                        </div>
                        <form action="">
                            <div class="col-3 mb-2">
                                <select class="form-select" aria-label="Default select example" name="">
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            <div class="mt-2">
                                <a href="https://wa.me/{{ $space->phone }}"
                                    class="btn btn-secondary text-white px-5">Hubungi
                                    Admin</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function reserveModal() {
            $('#reserveModal').modal('show');
        }

        function ratingModal() {
            $('#ratingModal').modal('show');
        }
    </script>
@endsection
