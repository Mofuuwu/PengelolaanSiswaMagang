@extends('adminlte::page')

@section('title', 'Edit Sekolah')

@section('content_header')
    <h1>Edit Sekolah</h1>
@stop

@section('content')
    <form action="{{ route('schools.update', $school->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="id">id</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $school['id'] }}" required>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Sekolah</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $school['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat Sekolah</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $school['address'] }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="responsiblePerson">Penanggung Jawab</label>
            <input type="text" class="form-control" id="responsiblePerson" name="responsiblePerson" value="{{ $school['responsiblePerson'] }}" required>
            @error('responsiblePerson')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop