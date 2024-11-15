@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Data Sekolah</h1>
@stop

@section('content')

    <form action="{{ route('schools.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id">NPSN</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Sekolah</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat Sekolah</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="responsiblePerson">Penanggung Jawab</label>
            <input type="text" class="form-control" id="responsiblePerson" name="responsiblePerson" value="{{ old('responsiblePerson') }}" required>
            @error('responsiblePerson')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop
