@extends('adminlte::page')
@section('title', 'Daftar Jurusan')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Jurusan</h2>
@stop

@section('content')
    <a href="{{ route('majors.create') }}" class="btn btn-primary mb-3">Tambah Jurusan</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Jurusan</th>
                <th>Nama Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($majors as $major)
                <tr>
                    <td>{{ $major->id }}</td>
                    <td>{{ $major->name }}</td>
                    <td>
                        <a href="{{ route('majors.edit', $major->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('majors.destroy', $major->id) }}" method="POST" style="display:inline-block;">
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
