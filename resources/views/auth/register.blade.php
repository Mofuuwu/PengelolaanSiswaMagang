@extends('layouts.main')
@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Form Register -->
            <div class="card shadow-sm">
                <div class="card-header text-primary text-center py-3">
                    <h4><b>Register</b></h4>
                </div>
                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf
                        <div class=" @error('name') is-invalid @enderror">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="name" class="form-control" id="name" name="name" required value="{{old('name')}}">
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mt-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select w-100" required>
                                <option value="" disabled {{ old('status') == '' ? 'selected' : '' }}>Silahkan Pilih Status Anda</option>
                                <option value="siswa" {{ old('status') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                <option value="dosen" {{ old('status') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                            </select>
                        </div>
                        <div class="mt-3 @error('email') is-invalid @enderror">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{old('email')}}">
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-3 @error('password') is-invalid @enderror">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Already have an account? <a href="/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection