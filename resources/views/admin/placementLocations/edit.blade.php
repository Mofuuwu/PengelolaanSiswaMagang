@extends('adminlte::page')

@section('title', 'Ubah Data Lokasi Penempatan')

@section('content_header')
    <h1>Ubah Data Lokasi Penempatan</h1>
@stop

@section('content')
    <form action="{{ route('placementLocations.update', $placementLocation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Gedung</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $placementLocation['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat Gedung</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $placementLocation['address'] }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop