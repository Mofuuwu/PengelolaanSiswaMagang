@extends('adminlte::page')
@section('title', 'Daftar Unit Kerja')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Unit Kerja</h2>
@stop

@section('content')
    <a href="{{ route('workUnits.create') }}" class="btn btn-primary mb-3">Tambah Unit Kerja</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Unit Kerja</th>
                <th>Pimpinan Unit</th>
                <th>Lokasi Penempatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workUnits as $workUnit)
                <tr>
                    <td>{{ $workUnit->id }}</td>
                    <td>{{ $workUnit->name }}</td>
                    <td>{{ $workUnit->leader }}</td>
                    <td>{{ $workUnit->placementLocation->name ?? 'Tidak Ditemukan' }}</td> <!-- Menampilkan nama lokasi -->
                    <td>
                        <a href="{{ route('workUnits.edit', $workUnit->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('workUnits.destroy', $workUnit->id) }}" method="POST" style="display:inline-block;">
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
