@extends('adminlte::page')

@section('title', 'Ubah Data Pembimbing Sekolah')

@section('content_header')
    <h1>Ubah Data Pembimbing Sekolah</h1>
@stop



@section('content')
    <form action="{{ route('universityAdvisors.update', $universityAdvisor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Pembimbing</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $universityAdvisor['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phoneNumber">Nomor Kontak</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $universityAdvisor['phoneNumber'] }}" required>
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="unit_id">Unit Kerja</label>
            <!-- Dropdown untuk memilih name sekolah -->
            <select class="form-control" id="unit_id" name="unit_id" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($workUnits as $workUnit)
                    <option value="{{ $workUnit->id }}" {{ $universityAdvisor->unit_id == $workUnit->id ? 'selected' : '' }}>
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
            <!-- Dropdown untuk memilih name sekolah -->
            <select class="form-control" id="placementLocation_id" name="placementLocation_id" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                @foreach($placementLocations as $placementLocation)
                    <option value="{{ $placementLocation->id }}" {{ $universityAdvisor->placementLocation_id == $placementLocation->id ? 'selected' : '' }}>
                        {{ $placementLocation->name }}
                    </option>
                @endforeach
            </select>
            @error('placementLocation_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop