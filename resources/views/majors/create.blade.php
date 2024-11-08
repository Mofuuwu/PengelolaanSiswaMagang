@extends('adminlte::page')

@section('title', 'Tambah Jurusan')

@section('content_header')
    <h1>Tambah Data Jurusan</h1>
@stop

@section('content')

    <form action="{{ route('majors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Jurusan</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
