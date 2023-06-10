@extends('layouts.app')

@section('content')
<section class="my-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col">
        <div class="d-flex align-items-center mb-5">
          <a href="/" class="text-decoration-none d-flex flex-row justify-content-center align-items-center">
            <img src="{{ asset('assets/images/backIcon.png') }}" alt="Back" width="20">
            <h4 class="ms-2 my-0">Back</h4>
          </a>
        </div>
        <div class="container-fluid mt-5">
          <div class="row flex-nowrap overflow-auto align-items-center">
            <div class="col-lg-4 mb-4">
              <img src="{{ asset('assets/images/carousel1.png') }}" class="card-img-top" alt="Image 1">
            </div>
            <div class="col-lg-4 mb-4">
              <img src="{{ asset('assets/images/carousel2.png') }}" class="card-img-top" alt="Image 2">
            </div>
            <div class="col-lg-4 mb-4">
              <img src="{{ asset('assets/images/carousel3.png') }}" class="card-img-top" alt="Image 3">
            </div>
          </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="carousel">
          <!-- Carousel items here -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="my-5">
  <div class="container">
    <h1 class="text-left fw-bold">EZO Working Space</h1>
    <h3>Coworking Space</h3>
    
    <div class="row mt-5">
      <div class="col-lg-12">
        <h4 class="fw-bold">Opening Hours</h4>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-1 text-center ms-5">
            <h5>Monday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Tuesday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Wednesday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Thursday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Friday</h5>
            <button class="btn btn-sm btn-danger mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-danger mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Saturday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
          </div>
          <div class="col-lg-1 text-center ms-5">
            <h5>Sunday</h5>
            <button class="btn btn-sm btn-success mb-2 rounded">09.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">10.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">11.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">12.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">13.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">14.00</button>
            <button class="btn btn-sm btn-success mb-2 rounded">15.00</button>
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
          <a href="#" class="btn btn-secondary ps-5 pe-5 text-white rounded">Reservasi</a>
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
          <p class="m-0">Rp50.000</p>
          <h5 class="mt-2">Meeting Room</h5>
          <p class="m-0">Rp100.000</p>
      </div>
      <div class="col-lg-3">
        <h3 class="fw-bold">Jam Buka</h3>
        <h5>Monday - Friday</h5>
        <div class="d-flex align-items-center">
          <img src="{{ asset('assets/images/clockIcon.png') }}" alt="Clock" width="20" class="me-2">
          <span>7 AM - 6 PM</span>
        </div>
      </div>
      <div class="col-lg-3">
        <h3 class="fw-bold">Fasilitas</h3>
        <p class="m-0">Wi-Fi</p>
        <p class="m-0">Proyektor</p>
        <p class="m-0">Snack dan Minuman</p>
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
          <h4 class="m-0">Jl. Dewandaru No.68, Jatimulyo, Kec. Lowokwaru, Kota Malang, Jawa Timur 65141</h4>
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
            <img src="{{ asset('assets/images/addIcon.png') }}" alt="Review Icon" width="40" class="ms-2">
          @endguest
        </h3>
      </div>
      <div class="col-lg-12">
        <div class="row mt-5">
          <div class="col-md-6 mb-4">
            <div class="card border-0 text-primary">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4">
                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture" class="rounded-circle mb-3" width="80" height="80">
                  </div>
                  <div class="col-8">
                    <h5 class="card-title mb-0">John Doe</h5>
                    <div class="rating-stars">
                      <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    </div>
                    <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat sesuai kebutuhan”</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 mb-4">
            <div class="card border-0 text-primary">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4">
                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture" class="rounded-circle mb-3" width="80" height="80">
                  </div>
                  <div class="col-8">
                    <h5 class="card-title mb-0">John Doe</h5>
                    <div class="rating-stars">
                      <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    </div>
                    <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat sesuai kebutuhan”</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 mb-4">
            <div class="card border-0 text-primary">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4">
                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture" class="rounded-circle mb-3" width="80" height="80">
                  </div>
                  <div class="col-8">
                    <h5 class="card-title mb-0">John Doe</h5>
                    <div class="rating-stars">
                      <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    </div>
                    <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat sesuai kebutuhan”</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6 mb-4">
            <div class="card border-0 text-primary">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-4">
                    <img src="{{ asset('assets/images/men.png') }}" alt="Profile Picture" class="rounded-circle mb-3" width="80" height="80">
                  </div>
                  <div class="col-8">
                    <h5 class="card-title mb-0">John Doe</h5>
                    <div class="rating-stars">
                      <span class="text-secondary">&#9733;&#9733;&#9733;&#9733;&#9734;</span>
                    </div>
                    <p class="card-text mt-3">“Beryukur banget nemu website ini, jadi gampang mau booking tempat sesuai kebutuhan”</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
