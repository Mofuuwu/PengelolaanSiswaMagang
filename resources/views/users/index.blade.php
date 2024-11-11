@extends('layouts.main')
@section('title', 'Home User')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="container">
    <div class="card m-auto bg-custom1 rounded-3 mb-3" style="width: 100%">
        <div class="card-body d-flex justify-content-between">
            <h2 class=" text-white">Haloo {{Auth::user()->name}}</h2>
            <a href="" class="btn btn-danger d-flex justify-center align-items-center"><b>Logout</b></a>
        </div>
    </div>
    <div class="card m-auto bg-transparent rounded-3" style="width: 100%">
        <div class="card-body">
            <h3 class="text-center">Data Diri Anda</h3>
            <h6 class="card-title">Nama Lengkap : {{Auth::user()->name}}</h6>
            <h6 class="card-title">Email : {{Auth::user()->email}}</h6>
            <h6 class="card-title">Nomor Telepon : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Kelas : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Jurusan : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Asal Sekolah : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Nama Guru Pembimbing : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <div class="card-item d-flex justify-content-end gap-2">
                <a href="" class="btn btn-primary"><b>Edit Data Diri</b></a>
                <a href="" class="btn btn-success"><b>Ajukan Magang</b></a>
            </div>
        </div>
    </div>
</div>
@endsection