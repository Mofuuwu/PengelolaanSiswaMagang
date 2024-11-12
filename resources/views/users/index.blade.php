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
            <a href="logout" class="btn btn-danger d-flex justify-center align-items-center"><b>Logout</b></a>
        </div>
    </div>
    <div class="card m-auto bg-transparent rounded-3 mb-3" style="width: 100%">
        <div class="card-body">
            <h3 class="text-center">Data Diri Anda</h3>
            <hr>
            <div class="col-md-4 d-flex justify-content-center align-items-center w-100 flex-column gap-3">
                <div class="rounded-circle ratio ratio-1x1 bg-black overflow-hidden w-25 d-flex justify-content-center align-items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/12225/12225935.png" alt="" class=" object-fit-cover">
                </div>
                <form action="">
                    <button type="submit" class="btn btn-success">Unggah Foto</button>
                </form>
            </div>
            <hr>
            <h6 class="card-title">Nama Lengkap : {{Auth::user()->name}}</h6>
            <h6 class="card-title">Email : {{Auth::user()->email}}</h6>
            <h6 class="card-title">Nomor Telepon : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Kelas : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Jurusan : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Asal Sekolah : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <h6 class="card-title">Nama Guru Pembimbing : <span class="text-danger">{{'Belum Diisi'}}</span></h6>
            <hr>
            <div class="card-item d-flex justify-content-end gap-2">
                <a href="" class="btn btn-primary"><b>Edit Data Diri</b></a>
                <a href="" class="btn btn-success"><b>Ajukan Magang</b></a>
            </div>
        </div>
    </div>
    <div class="rounded-top-3 m-auto bg-custom1 p-4" style="width: 100%">
        <div class="card-body d-flex justify-content-between">
            <p></p>
        </div>
    </div>
</div>
@endsection