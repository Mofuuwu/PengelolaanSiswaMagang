@extends('adminlte::page')
@section('title', 'Daftar Lokasi Penempatan')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Lokasi Penempatan</h2>
@stop

@section('content')
    <a href="{{ route('placementLocations.create') }}" class="btn btn-primary mb-3">Tambah Lokasi Penempatan</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Lokasi Penempatan</th>
                <th>Nama Gedung</th>
                <th>Alamat Gedung</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($placementLocations as $PlacementLocation)
                <tr>
                    <td>{{ $PlacementLocation->id }}</td>
                    <td>{{ $PlacementLocation->name }}</td>
                    <td>{{ $PlacementLocation->address}}</td>
                    <td>
                        <a href="{{ route('placementLocations.edit', $PlacementLocation->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('placementLocations.destroy', $PlacementLocation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
