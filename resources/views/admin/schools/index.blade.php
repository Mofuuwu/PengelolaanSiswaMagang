@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Sekolah</h2>
@stop

@section('content')
    <a href="{{ route('schools.create') }}" class="btn btn-primary mb-3">Tambah Sekolah</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Alamat Sekolah</th>
                <th>Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{ $school->id }}</td>
                    <td>{{ $school->name }}</td>
                    <td>{{ $school->address }}</td>
                    <td>{{ $school->responsiblePerson }}</td>
                    <td>
                        <a href="{{ route('schools.edit', $school->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('schools.destroy', $school->id) }}" method="POST" style="display:inline-block;">
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
