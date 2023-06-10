@extends('layouts.app-admin')

@section('content')
    <div class="row">
        @for ($i = $start; $i <= $end; $i++)
            <div class="col">
                <div class="row">
                    {{ $week[$i] }}
                </div>
                <div class="row">
                    {{ $date[$i] }}
                </div>

                @php $k = 0; @endphp
                @for ($j = Carbon\Carbon::parse($data->open_time); $j <= Carbon\Carbon::parse($data->close_time); $j->addHour())
                    <div class="row">
                        <div class="col-1">
                            <button class="btn btn-success @if (in_array($j->format('H:i:s'), $jadwal[$i])) disabled @endif"
                                onclick="showForm('{{ $j->format('H:i:s') }}','{{ $week[$i] }}','{{ $date[$i] }}')">
                                {{ $j->format('H:i') }}
                            </button>
                        </div>
                    </div>
                    @php $k++; @endphp
                @endfor
            </div>
        @endfor


        <!-- boostrap price modal -->
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
                                <div class="col">
                                    <label for="" class="form-label">Email Pemesan</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                    <div id="validationEmail" class="invalid-feedback" style="display: block">

                                    </div>
                                </div>

                                <div class="col mt-2">
                                    <button type="submit" class="btn btn-secondary text-white" id="btn-save">Buat
                                        Reservasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->
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
