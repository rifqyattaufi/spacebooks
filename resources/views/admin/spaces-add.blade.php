@extends('layouts.app-admin')

@section('content')
    <form action="{{ route('admin.spaces.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Address</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Capacity</label>
            <input type="number" class="form-control @error('capacity') is-invalid @enderror" id="capacity"
                name="capacity" value="{{ old('capacity') }}">
            @error('capacity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Open-Close Day</label>
            <div class="row">
                <div class="col">
                    <select class="form-select @error('open_day') is-invalid @enderror" name="open_day">
                        <option value="Senin" @if (old('open_day') == 'Senin') selected @endif>Senin</option>
                        <option value="Selasa" @if (old('open_day') == 'Selasa') selected @endif>Selasa</option>
                        <option value="Rabu" @if (old('open_day') == 'Rabu') selected @endif>Rabu</option>
                        <option value="Kamis" @if (old('open_day') == 'Kamis') selected @endif>Kamis</option>
                        <option value="Jumat" @if (old('open_day') == 'Jumat') selected @endif>Jumat</option>
                        <option value="Sabtu" @if (old('open_day') == 'Sabtu') selected @endif>Sabtu</option>
                        <option value="Minggu" @if (old('open_day') == 'Minggu') selected @endif>Minggu</option>
                    </select>
                    @error('open_day')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <select class="form-select @error('close_day') is-invalid @enderror" name="close_day">
                        <option value="Senin" @if (old('close_day') == 'Senin') selected @endif>Senin</option>
                        <option value="Selasa" @if (old('close_day') == 'Selasa') selected @endif>Selasa</option>
                        <option value="Rabu" @if (old('close_day') == 'Rabu') selected @endif>Rabu</option>
                        <option value="Kamis" @if (old('close_day') == 'Kamis') selected @endif>Kamis</option>
                        <option value="Jumat" @if (old('close_day') == 'Jumat') selected @endif>Jumat</option>
                        <option value="Sabtu" @if (old('close_day') == 'Sabtu') selected @endif>Sabtu</option>
                        <option value="Minggu" @if (old('close_day') == 'Minggu') selected @endif>Minggu</option>
                    </select>
                    @error('close_day')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Open-Close Time</label>
            <div class="row">
                <div class="col">
                    <input type="time" class="form-control @error('open_time') is-invalid @enderror" name="open_time"
                        id="close_time" value="{{ old('open_time') }}">
                    @error('open_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <input type="time" class="form-control @error('close_time') is-invalid @enderror" name="close_time"
                        id="close_time" value="{{ old('close_time') }}">
                    @error('close_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">Submit</button>
    </form>
@endsection
