@extends('adminlte::page')
@section('title', 'Daftar Siswa')
@push('css')
    <link rel="stylesheet" href="css/style.css">
@endpush

@section('content_header')
    <h2 class="c-header">Daftar Siswa Pkl</h2>
@stop

@section('content')
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Asal Sekolah</th>
                <!-- <th>Nomor Kontak</th>
                <th>Alamat</th>
                <th>Pembimbing Sekolah</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->major->name }}</td>
                    <td>{{ $student->school->name }}</td>
                    <!-- <td>{{ $student->phoneNumber }}</td> -->
                    <!-- <td>{{ $student->address }}</td> -->
                    <!-- <td>{{ $student->schoolAdvisor->name }}</td> -->
                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary">Lihat</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
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
