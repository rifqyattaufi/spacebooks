@extends('layouts.app-admin')

@section('content')
    @if (!isset($data))
        Belum bikin spaces kamu? ayo bikin sekarang
        <a href="{{ route('admin.spaces.add') }}" class="btn btn-secondary">Buat</a>
    @else
        <div class="h1">{{ $data->name }}</div>
        <div class="h4">{{ $data->description }}</div>
        <div class="row">
            <div class="col">
                <div class="h2">Harga</div>
            </div>
            <div class="col">
                <a onclick="editPrice({{ $data->id }})" data-toggle="tooltip" class="btn btn-secondary">Ubah</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Coworking Space
            </div>
            <div class="col">
                @if ($data->coworking_price == null || $data->coworking_price == 0)
                    <span class="text-danger">Tidak tersedia</span>
                @else
                    Rp. {{ number_format($data->coworking_price) }} ,-
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                Meeting Room
            </div>
            <div class="col">
                @if ($data->meeting_price == null || $data->meeting_price == 0)
                    <span class="text-danger">Tidak tersedia</span>
                @else
                    Rp. {{ number_format($data->meeting_price) }} ,-
                @endif
            </div>
        </div>
        <div class="h2">Lokasi</div>
        <div class="h4">{{ $data->address }}</div>
        <div class="h2">Jam Buka dan Kapasitas</div>
        <div class="row">
            <div class="col">
                <div class="h4">{{ $data->open_day }} - {{ $data->close_day }}</div>
            </div>
            <div class="col">
                <div class="h4">{{ $data->open_time }} - {{ $data->close_time }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="h4">Kapasitar</div>
            </div>
            <div class="col">
                <div class="h4">{{ $data->capacity }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="h2">
                    Fasilitas
                </div>
            </div>
            <div class="col">
                <a href="" class="btn btn-secondary">Ubah</a>
            </div>
        </div>
        <div class="row">

        </div>
    @endif

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
                                    <input type="number" class="form-control" id="coworking_price" name="coworking_price"
                                        placeholder="Rp. 50.000">
                                </div>
                            </div>
                            <div class="form-group mt-2">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="meeting_price" name="meeting_price"
                                        placeholder="Rp. 100.000">
                                </div>
                            </div>
                            <div class="col mt-2">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->
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
                    location.reload();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection
