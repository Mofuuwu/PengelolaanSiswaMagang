@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
    <h1>Edit Siswa</h1>
@stop

@section('content')
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id">NISN</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ $student['id'] }}" required>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="name">Nama Siswa</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student['name'] }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="class">Kelas</label>
            <select name="class" id="class" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('class', $student['class']) == '' ? 'selected' : '' }}>Pilih Kelas</option>
                <option value="10" {{ old('class', $student['class']) == '10' ? 'selected' : '' }}>10</option>
                <option value="11" {{ old('class', $student['class']) == '11' ? 'selected' : '' }}>11</option>
                <option value="12" {{ old('class', $student['class']) == '12' ? 'selected' : '' }}>12</option>
            </select>
            @error('class')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="major_id">Jurusan</label>
            <select name="major_id" id="major_id" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('major_id', $student['major_id']) == '' ? 'selected' : '' }}>Pilih Jurusan</option>
                @foreach ($majors as $major )
                    <option value="{{$major->id}}" {{ $student->major_id == $major->id ? 'selected' : '' }}>
                        {{$major->name}}
                    </option>
                @endforeach
            </select>
            @error('major_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="school_id">Nama Sekolah</label>
            <select name="school_id" id="school_id" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('school_id', $student['school_id']) == '' ? 'selected' : '' }}>Pilih Sekolah</option>
                @foreach ($schools as $school )
                    <option value="{{$school->id}}" {{ $student->school_id == $school->id ? 'selected' : '' }}>
                        {{$school->name}}
                    </option>
                @endforeach
            </select>
            @error('school_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $student['address'] }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phoneNumber">Nomor Kontak</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" pattern="^0[0-9]{9,12}$" required placeholder="Contoh: 081234567890" value="{{ $student['phoneNumber'] }}">
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="schoolAdvisor_id">Nama Pembimbing</label>
            <select name="schoolAdvisor_id" id="schoolAdvisor_id" autocomplete="off" class="form-control" required>
                <option value="" disabled {{ old('schoolAdvisor_id', $student['schoolAdvisor_id']) == '' ? 'selected' : '' }}>Pilih Pembimbing</option>
                @foreach ($schoolAdvisors as $schoolAdvisor )
                    <option value="{{$schoolAdvisor->id}}" {{ $student->schoolAdvisor_id == $schoolAdvisor->id ? 'selected' : '' }}>
                        {{$schoolAdvisor->name}}
                    </option>
                @endforeach
            </select>
            @error('school_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop