@extends('layouts.main')
@section('title', 'Login')

@section('content')

<div class="container m-auto">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session('success'))
                <div class="success alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('loginError'))
                <div class="alert alert alert-danger">
                    {{ session('loginError') }}
                </div>
            @endif

            <!-- Form Login -->
            <div class="card shadow-sm">
                <div class="card-header text-primary text-center py-3">
                    <h4><b>Login</b></h4>
                </div>
                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{old('email')}}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Don't have an account? <a href="/register">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection