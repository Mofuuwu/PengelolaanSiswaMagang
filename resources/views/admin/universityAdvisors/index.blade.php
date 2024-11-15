@extends('adminlte::page')
@section('title', 'Daftar Instruktur Pembimbing Universitas')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Instruktur Pembimbing Universitas</h2>
@stop

@section('content')
        <a href="{{ route('universityAdvisors.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pembimbing</th>
                <th>Nama Pembimbing</th>
                <th>Nomor Kontak</th>
                <th>Unit Kerja</th>
                <th>Lokasi Penempatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($universityAdvisors as $universityAdvisor)
                <tr>
                    <td>{{ $universityAdvisor->id }}</td>
                    <td>{{ $universityAdvisor->name }}</td>
                    <td>{{ $universityAdvisor->phoneNumber }}</td>
                    <td>{{ $universityAdvisor->workUnit->name }}</td>
                    <td>{{ $universityAdvisor->placementLocation->name }}</td>
                    <td>
                        <a href="{{ route('universityAdvisors.edit', $universityAdvisor->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('universityAdvisors.destroy', $universityAdvisor->id) }}" method="POST" style="display:inline-block;">
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
