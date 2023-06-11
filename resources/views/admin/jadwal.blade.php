@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-12 d-flex justify-content-evenly">
                @if (request()->get('type') == 'meeting')
                    <a class="btn btn-outline-secondary ps-5 pe-5" href="?type=coworking">Coworking Space</a>
                    <a class="btn btn-secondary text-light ps-5 pe-5" href="?type=meeting">Meeting Room</a>
                @else
                    <a class="btn btn-secondary text-light ps-5 pe-5" href="?type=coworking">Coworking Space</a>
                    <a class="btn btn-outline-secondary ps-5 pe-5" href="?type=meeting">Meeting Room</a>
                @endif
            </div>
            <div class="col-lg-12 d-flex justify-content-center my-4">
                <img src="{{ asset('assets/images/warn.png') }}" alt="warning" width="15" class="me-4">
                <h6 class="m-0">Klik jam untuk mencatat reservasi terbaru pelanggan</h6>
                <img src="{{ asset('assets/images/warn.png') }}" alt="warning" width="15" class="ms-4">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div class="row align-items-center justify-content-center">
                    @for ($i = $start; $i <= $end; $i++)
                        <div class="col-1 text-center ms-5">
                            <h5>
                                {{ $week[$i] }}
                            </h5>
                            <h6>
                                {{ $date[$i] }}
                            </h6>
                            @php $k = 0; @endphp
                            @for ($j = Carbon\Carbon::parse($data->open_time); $j <= Carbon\Carbon::parse($data->close_time); $j->addHour())
                                <div class="d-grid">
                                    <button
                                        class="btn btn-sm mb-2 rounded @if (in_array($j->format('H:i:s'), $jadwal[$i])) btn-danger disabled @else btn-success @endif"
                                        onclick="showForm('{{ $j->format('H:i:s') }}','{{ $week[$i] }}','{{ $date[$i] }}')">
                                        {{ $j->format('H:i') }}
                                    </button>
                                </div>
                                @php $k++; @endphp
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-4 d-flex justify-content-center">
            <h6 class="mt-2">
                <a href="" class="btn btn-sm btn-success text-success rounded my-0">--</a>
                Tersedia
                <a href="" class="ms-5 btn btn-sm btn-danger text-danger disabled rounded my-0">--</a>
                Tidak Tersedia
            </h6>
        </div>
    </div>


    <div class="modal fade" id="orderModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="fw-bold">Buat Reservasi</div>
                        <form action="javascript:void(0)" id="orderForm" name="orderForm" class="form-horizontal"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                            <input type="hidden" name="reserve_time" id="reserve_time">
                            <input type="hidden" name="reserve_date" id="reserve_date">
                            <input type="hidden" name="type" id="type">
                            <div class="col">
                                <label for="" class="form-label">Email Pemesan</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <div id="validationEmail" class="invalid-feedback" style="display: block">

                                </div>
                            </div>

                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Buat
                                    Reservasi</button>
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
        $(document).ready(function() {
            var jadwal;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content')
                }
            });
        })

        function showForm(time, week, date) {
            if ('{{ request()->get('type') }}' == 'meeting') {
                $('#type').val(1);
            } else {
                $('#type').val(0);
            }
            $('#reserve_time').val(time);
            $('#reserve_date').val(date);
            $('#orderModal').modal('show');
        }

        $('#orderForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.jadwal.add') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    this.reset();
                    $('#orderModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    $('#validationEmail').html(data['responseText']);
                }
            });
        });

        $('#orderModal').on('hidden.bs.modal', function() {
            $('#validationEmail').html('');
        })

        $('#successModal').on('hidden.bs.modal', function() {
            location.reload();
        })
    </script>
@endsection
