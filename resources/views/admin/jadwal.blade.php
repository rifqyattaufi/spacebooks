@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <div class="row p-4">
            <div class="col-lg-12 d-flex justify-content-evenly">
                <a class="btn btn-secondary text-light ps-5 pe-5" href="#">Coworking Space</a>
                <a class="btn btn-outline-secondary ps-5 pe-5" href="#">Meeting Room</a>
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
                                        class="btn btn-sm btn-success mb-2 rounded @if (in_array($j->format('H:i:s'), $jadwal[$i])) disabled @endif"
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
            <div class="col-lg-12 mt-4 d-flex justify-content-center">
                <h6 class="mt-2">
                    <a href="" class="btn btn-sm btn-success text-success rounded my-0">--</a>
                    Tersedia
                    <a href="" class="ms-5 btn btn-sm btn-danger text-danger rounded my-0">--</a>
                    Tidak Tersedia
                </h6>
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

        function getJadwal(date, time) {
            $.ajax({
                type: 'POST',
                url: "{{-- route('admin.jadwal.get') --}}",
                data: {
                    space_id: {{ $data->id }},
                    reserve_date: date,
                    reserve_time: time
                },
                success: (data) => {
                    jadwal = data['responseText'];
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function showForm(time, week, date) {
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
                    alert('Reservasi berhasil dibuat');
                    location.reload();
                },
                error: function(data) {
                    $('#validationEmail').html(data['responseText']);
                }
            });
        });

        $('#orderModal').on('hidden.bs.modal', function() {
            $('#validationEmail').html('');
        })
    </script>
@endsection
