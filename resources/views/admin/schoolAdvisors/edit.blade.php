@extends('adminlte::page')

@section('title', 'Ubah Data Pembimbing Sekolah')

@section('content_header')
    <h1>Ubah Data Pembimbing Sekolah</h1>
@stop

@section('content')
    <form action="{{ route('schoolAdvisors.update', $schoolAdvisor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Pembimbing</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $schoolAdvisor['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phoneNumber">Nomor Kontak</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $schoolAdvisor['phoneNumber'] }}" required>
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="school_id">Nama Sekolah</label>
            <!-- Dropdown untuk memilih name sekolah -->
            <select class="form-control" id="school_id" name="school_id" required>
                <option value=""disabled selected >Pilih Sekolah</option>
                @foreach($schools as $school)
                    <option value="{{ $school->id }}" {{ $schoolAdvisor->school_id == $school->id ? 'selected' : '' }}>
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
            @error('lokasiPenempatan')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop