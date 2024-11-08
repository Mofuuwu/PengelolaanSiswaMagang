@extends('adminlte::page')

@section('title', 'Tambah Data Instruktur Pembimbing')

@section('content_header')
    <h1>Tambah Data Instruktur Pembimbing</h1>
@stop

@section('content')

    <form action="{{ route('universityAdvisors.store') }}" method="POST">
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
            <input type="phoneNumber" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ old('phoneNumber') }}" required>
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="unit_id">Unit Kerja</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="unit_id" name="unit_id" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($workUnits as $workUnit)
                    <option value="{{ $workUnit->id }}" {{ old('unit_id') == $workUnit->name ? 'selected' : '' }}>
                        {{ $workUnit->name }}
                    </option>
                @endforeach
            </select>
            @error('unit_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="placementLocation_id">Lokasi Penempatan</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="placementLocation_id" name="placementLocation_id" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($placementLocations as $placementLocation)
                    <option value="{{ $placementLocation->id }}" {{ old('placementLocation_id') == $placementLocation->name ? 'selected' : '' }}>
                        {{ $placementLocation->name }}
                    </option>
                @endforeach
            </select>
            @error('placementLocation_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

@stop
