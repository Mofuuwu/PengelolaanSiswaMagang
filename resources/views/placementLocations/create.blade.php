@extends('adminlte::page')

@section('title', 'Tambah Data Lokasi Penempatan')

@section('content_header')
    <h1>Tambah Data Lokasi Penempatan</h1>
@stop

@section('content')

    <form action="{{ route('placementLocations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Gedung</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Alamat Gedung</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
