@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-5">
                @if (!isset($data))
                    Belum bikin spaces kamu? ayo bikin sekarang
                    <a href="{{ route('admin.spaces.add') }}" class="ms-2 text-white btn btn-secondary">Buat</a>
                @else
                    <h1 class="text-left fw-bold">{{ $data->name }}</h1>
                    <h6 class="lh-lg mb-4 text-wrap" style="width: 80%;">{{ $data->description }}</h6>

                    <div class="row d-flex justify-content-between">
                        <div class="col-lg-6 d-flex justify-content-start">
                            <h3 class="fw-bold">Harga</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <a onclick="editPrice({{ $data->id }})" data-toggle="tooltip">
                                <img src="{{ asset('assets/images/editIcon.png') }}" alt="Edit" width="30"
                                    class="me-2 hover_tunjuk">
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <h6 class="mt-2">Coworking Space</h6>
                        </div>
                        <div class="col d-flex align-items-center">
                            @if ($data->coworking_price == null || $data->coworking_price == 0)
                                <h6 class="text-danger">Tidak tersedia</h6>
                            @else
                                <h6 class="m-0">Rp. {{ number_format($data->coworking_price) }} ,-</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <h6 class="mt-2">Meeting Room</h6>
                        </div>
                        <div class="col d-flex align-items-center">
                            @if ($data->meeting_price == null || $data->meeting_price == 0)
                                <h6 class="text-danger">Tidak tersedia</h6>
                            @else
                                <h6 class="m-0">Rp. {{ number_format($data->meeting_price) }} ,-</h6>
                            @endif
                        </div>
                    </div>

                    <div class="row mt-4 d-flex justify-content-between">
                        <div class="col-lg-4 d-flex justify-content-start">
                            <h3 class="fw-bold mb-3">Lokasi</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <a onclick="addressModal()" data-toggle="tooltip">
                                <img src="{{ asset('assets/images/editIcon.png') }}" alt="Edit" width="30"
                                    class="me-2 hover_tunjuk">
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('assets/images/pinIcon.png') }}" alt="Location" width="15"
                                    class="me-4">
                                <h6 class="m-0">{{ $data->address }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 d-flex justify-content-between">
                        <div class="col-lg-4 d-flex justify-content-start">
                            <h3 class="fw-bold mb-3">Jam Buka dan Kapasitas</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <a onclick="openCloseModal()" data-toggle="tooltip">
                                <img src="{{ asset('assets/images/editIcon.png') }}" alt="Edit" width="30"
                                    class="me-2 hover_tunjuk">
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <h6 class="mt-2">{{ $data->open_day }} - {{ $data->close_day }}</h6>
                        </div>
                        <div class="col d-flex align-items-center">
                            <h6 class="m-0">{{ $data->open_time }} - {{ $data->close_time }}</h6>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <h6 class="mt-2">Kapasitas</h6>
                        </div>
                        <div class="col d-flex align-items-center">
                            <h6 class="m-0">{{ $data->capacity }} Orang</h6>
                        </div>
                    </div>
                    <div class="row mt-4 d-flex justify-content-between">
                        <div class="col-lg d-flex justify-content-start">
                            <h3 class="fw-bold mb-3">Contact</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <a onclick="editPhone({{ $data->id }})" data-toggle="tooltip">
                                <img src="{{ asset('assets/images/editIcon.png') }}" alt="Edit" width="30"
                                    class="me-2 hover_tunjuk">
                            </a>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center">
                        <div class="col d-flex align-items-center">
                            <h6 class="mt-2">{{ $data->phone }}</h6>
                        </div>
                    </div>

                    <div class="row mt-4 d-flex justify-content-between">
                        <div class="col-lg-6 d-flex justify-content-start">
                            <h3 class="fw-bold mb-3">Fasilitas</h3>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center">
                            <a onclick="facilityModal()" data-toggle="tooltip">
                                <img src="{{ asset('assets/images/editIcon.png') }}" alt="Edit" width="30"
                                    class="me-2 hover_tunjuk">
                            </a>
                        </div>
                    </div>

                    <div class="row row-cols-5">
                        @foreach ($facility as $f)
                            <div class="col d-flex justify-content-start">
                                <h6 class="me-2 ms-2">{{ $f->name }}</h6>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>


    <!-- boostrap price modal -->
    <div class="modal fade" id="priceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="fw-bold">Edit Harga</div>
                        <form action="javascript:void(0)" id="priceForm" name="priceForm" class="form-horizontal"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                            <div class="form-group">
                                <div class="col-5">
                                    <select class="form-select" name="price_type" id="price_type">
                                        <option value="1">Coworking Space</option>
                                        <option value="2">Meeting Room</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="coworking_price"
                                        name="coworking_price" placeholder="Rp. 50.000">
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="meeting_price" name="meeting_price"
                                        placeholder="Rp. 100.000">
                                </div>
                            </div>
                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- boostrap price modal -->
    <div class="modal fade" id="facilityModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-10">
                                <div class="fw-bold">Edit Fasilitas</div>
                            </div>
                            <div class="col-2">
                                <img src="{{ asset('assets/images/plusIcon.png') }}" onclick="addInput()" alt="Add"
                                    width="30" class="mx-2 hover_tunjuk">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="javascript:void(0)" id="facilityForm" name="facilityForm"
                                    class="form-horizontal" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                                    <div class="form-group mt-2" id="facilityInput">
                                        @foreach ($facility as $f)
                                            <div class="col-sm-12 mt-2">
                                                <input type="hidden" name="id[]" id="id"
                                                    value="{{ $f->id }}">
                                                <input type="text" class="form-control" id="facility"
                                                    name="facility[]" placeholder="Masukkan Fasilitas"
                                                    value="{{ $f->name }}">
                                            </div>
                                        @endforeach
                                        @if (count($facility) == 0)
                                            <div class="col-sm-12 mt-2">
                                                <input type="hidden" name="id[]" id="id" value="">
                                                <input type="text" class="form-control" id="facility"
                                                    name="facility[]" placeholder="Masukkan Fasilitas">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col mt-2 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save
                                            changes
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->

    <div class="modal fade" id="phoneModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="fw-bold">Edit Contact</div>
                            </div>
                        </div>
                        <form action="javascript:void(0)" id="phoneForm" name="phoneForm" class="form-horizontal"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                            <div class="form-group mt-2" id="phoneInput">
                                <div class="col-sm-12 mt-2">
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        placeholder="Masukkan Contact" value="{{ $data->phone }}">
                                    <div id="validationPhone" class="invalid-feedback" style="display: block">

                                    </div>
                                </div>
                            </div>
                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addressModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="fw-bold">Edit Address</div>
                            </div>
                        </div>
                        <form action="javascript:void(0)" id="addressForm" name="addressForm" class="form-horizontal"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                            <div class="form-group mt-2" id="phoneInput">
                                <div class="col-sm-12 mt-2">
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="Masukkan Contact" value="{{ $data->address }}">
                                    <div id="validationAddress" class="invalid-feedback" style="display: block"></div>
                                </div>
                            </div>
                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="openCloseModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="fw-bold">Edit Open-Close Time</div>
                            </div>
                        </div>
                        <form action="javascript:void(0)" id="openCloseForm" name="openCloseForm"
                            class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                            <div class="form-group mt-2">
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Masukkan Contact" value="{{ $data->address }}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Open-Close Day</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select @error('open_day') is-invalid @enderror"
                                                name="open_day">
                                                <option value="Senin" @if ($data->open_day == 'Senin') selected @endif>
                                                    Senin</option>
                                                <option value="Selasa" @if ($data->open_day == 'Selasa') selected @endif>
                                                    Selasa</option>
                                                <option value="Rabu" @if ($data->open_day == 'Rabu') selected @endif>
                                                    Rabu</option>
                                                <option value="Kamis" @if ($data->open_day == 'Kamis') selected @endif>
                                                    Kamis</option>
                                                <option value="Jumat" @if ($data->open_day == 'Jumat') selected @endif>
                                                    Jumat</option>
                                                <option value="Sabtu" @if ($data->open_day == 'Sabtu') selected @endif>
                                                    Sabtu</option>
                                                <option value="Minggu" @if ($data->open_day == 'Minggu') selected @endif>
                                                    Minggu</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-select @error('close_day') is-invalid @enderror"
                                                name="close_day">
                                                <option value="Senin" @if ($data->close_day == 'Senin') selected @endif>
                                                    Senin</option>
                                                <option value="Selasa" @if ($data->close_day == 'Selasa') selected @endif>
                                                    Selasa</option>
                                                <option value="Rabu" @if ($data->close_day == 'Rabu') selected @endif>
                                                    Rabu</option>
                                                <option value="Kamis" @if ($data->close_day == 'Kamis') selected @endif>
                                                    Kamis</option>
                                                <option value="Jumat" @if ($data->close_day == 'Jumat') selected @endif>
                                                    Jumat</option>
                                                <option value="Sabtu" @if ($data->close_day == 'Sabtu') selected @endif>
                                                    Sabtu</option>
                                                <option value="Minggu" @if ($data->close_day == 'Minggu') selected @endif>
                                                    Minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Open-Close Time</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="time"
                                                class="form-control @error('open_time') is-invalid @enderror"
                                                name="open_time" id="close_time" value="{{ $data->open_time }}">
                                        </div>
                                        <div class="col">
                                            <input type="time"
                                                class="form-control @error('close_time') is-invalid @enderror"
                                                name="close_time" id="close_time" value="{{ $data->close_time }}">
                                        </div>
                                    </div>
                                </div>
                                <div id="validationAddress" class="invalid-feedback" style="display: block"></div>
                            </div>
                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save
                                    changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#meeting_price').hide();
        })

        function editPhone($id) {
            $('#phoneModal').modal('show');
            $('#id').val($id);
        }

        $('#phoneForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.spaces.phone.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    $('#phoneModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    $('#validationPhone').html(data['responseText']);
                }
            });
        });

        function editPrice(id) {
            $.ajax({
                url: "{{ route('admin.spaces.price') }}",
                type: "POST",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#priceModal').modal('show');
                    $('#coworking_price').val(res.coworking_price);
                    $('#meeting_price').val(res.meeting_price);
                }
            });
        }

        $('#price_type').change(function() {
            if ($(this).val() == 1) {
                $('#coworking_price').show();
                $('#meeting_price').hide();
            } else {
                $('#coworking_price').hide();
                $('#meeting_price').show();
            }
        });

        $('#priceForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.spaces.price.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#priceModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        function facilityModal() {
            $('#facilityModal').modal('show');
        }

        function addInput() {
            var input =
                '<div class="col-sm-12 mt-2"> <input type="hidden" name="id[]" id="id" value=""> <input type = "text" class = "form-control" id = "facility" name = "facility[]" placeholder= "Masukkan Fasilitas"></div>';
            $('#facilityInput').append(input);
        }

        $('#facilityForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.spaces.facility.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#facilityModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    console.log(data['responseText']);
                }
            });
        });

        $('#successModal').on('hidden.bs.modal', function() {
            location.reload();
        });

        function addressModal() {
            $('#addressModal').modal('show');
        }

        $('#addressForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.spaces.address.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#addressModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    $('#validationAddress').html(data['responseText']);
                }
            });
        });

        function openCloseModal() {
            $('#openCloseModal').modal('show');
        }

        $('#openCloseForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.spaces.openClose.update') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#openCloseModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    $('#validationAddress').html(data['responseText']);
                }
            });
        });
    </script>
@endsection
