@extends('adminlte::page')

@section('title', 'Edit Sekolah')

@section('content_header')
    <h1>Edit Unit Kerja</h1>
@stop

@section('content')
    <form action="{{ route('workUnits.update', $workUnit->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nama Unit Kerja</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $workUnit['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="leader">Pimpinan Unit</label>
            <input type="text" class="form-control" id="leader" name="leader" value="{{ $workUnit['leader'] }}" required>
            @error('leader')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="placementLocation_id">Lokasi Penempatan</label>
            <!-- Dropdown untuk memilih nama sekolah -->
            <select class="form-control" id="placementLocation_id" name="placementLocation_id" required>
                <option value=""disabled selected >Pilih Unit Kerja</option>
                    @foreach($placementLocations as $placementLocation)
                        <option value="{{ $placementLocation->id }}" {{ $workUnit->placementLocation_id == $placementLocation->id ? 'selected' : '' }}>
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