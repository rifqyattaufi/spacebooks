@extends('layouts.app-admin')

@section('content')
    <a onclick="showImageForm()" class="btn btn-secondary text-light">Unggah foto</a>
    <div class="row">
        @foreach ($image as $i)
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="{{ url('/images/', $i->image) }}" class="card-img-top"
                        style="aspect-ratio:16/9; object-fit:cover;">
                    <div class="card-body">
                        <form action="" id="deleteImage">
                            <input type="hidden" value="{{ $i->id }}" name="id" id="id">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- boostrap price modal -->
    <div class="modal fade" id="imageModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="fw-bold">Unggah Foto</div>
                        <div class="d-flex justify-content-center">
                            <img id="preview" src="" alt="your image" class="mt-3"
                                style="max-width: 100%; max-height: 300px; display: none;" />
                        </div>
                        <form action="javascript:void(0)" id="imageForm" name="imageForm" class="form-horizontal"
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="space_id" id="space_id" value="{{ $data->id }}">
                            <div class="form-group mt-2">
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                            <div class="col mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-secondary text-white" id="btn-save">Upload
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
        })

        function showImageForm() {
            $('#imageModal').modal('show');
        }

        $('#image').change(function(e) {
            $('#preview').css('display', 'block');
            $('#preview').attr('src', URL.createObjectURL(e.target.files[0]));
        })

        $('#imageModal').on('hidden.bs.modal', function() {
            $('#preview').css('display', 'none');
            $('#preview').attr('src', '');
            $('#image').val('');
        })

        $('#imageForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('admin.gallery.add') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#imageModal').modal('hide');
                    $('#successModal').modal('show');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#successModal').on('hidden.bs.modal', function() {
            location.reload();
        })

        $('#deleteImage').submit(function(e) {
            e.preventDefault();
            let text = "Are you sure want to delete this image?.";
            if (confirm(text) == true) {
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.gallery.delete') }}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#successModal').modal('show');
                    },
                    error: function(data) {
                        console.log(data['responseText']);
                    }
                });
            }
        });
    </script>
@endsection
