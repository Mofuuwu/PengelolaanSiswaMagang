@extends('adminlte::page')

@section('title', 'Tambah Data Pembimbing Sekolah')

@section('content_header')
    <h1>Tambah Data Pembimbing Sekolah</h1>
@stop

@section('content')

    <form action="{{ route('schoolAdvisors.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Pembimbing</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phoneNumber">Nomor Kontak</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="school_id">Nama Sekolah</label>
            <!-- Dropdown untuk memilih name sekolah -->
            <select class="form-control" id="school_id" name="school_id" required>
                <option value="" disabled selected>Pilih Sekolah</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}">
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
            @error('school_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop
