@extends('adminlte::page')

@section('title', 'Edit Sekolah')

@section('content_header')
    <h1>Edit Jurusan</h1>
@stop

@section('content')
    <form action="{{ route('majors.update', $major->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Jurusan</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $major['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop