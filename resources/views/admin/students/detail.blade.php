@extends('adminlte::page')

@section('title', 'Detail Siswa')

@section('content')

<div class="container" style="width: 80%; margin: 0 auto;">

    <a href="{{ route('students.index') }}" class="btn btn-secondary my-3 px-4">Kembali</a>
    <div class="card mb-3 overflow-hidden">
        <div class="row g-0">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="ratio ratio-1x1 bg rounded-start" style="width: 100%; height: 100%; ">
                    <img src="{{asset('storage/img/students/' . $student->profilePhoto)}}" class="img-fluid rounded-start" alt="..." style="width:100%; height:100%; object-fit: cover; ">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><b>NISN : </b> {{$student->id}}</h5> <br>
                    <h5 class="card-title"><b>Nama : </b> {{$student->name}}</h5> <br>
                    <h5 class="card-title"><b>Kelas : </b>{{$student->class}}</h5> <br>
                    <h5 class="card-title"><b>Jurusan : </b>{{$student->major->name}}</h5> <br>
                    <h5 class="card-title"><b>Sekolah : </b>{{$student->school->name}}</h5> <br>
                    <h5 class="card-title"><b>Nomor Telepon : </b>{{$student->phoneNumber}}</h5> <br>
                    <h5 class="card-title"><b>Alamat : </b>{{$student->address}}</h5> <br>
                    <h5 class="card-title"><b>Nama Ayah : </b>{{$student->fatherName}}</h5> <br>
                    <h5 class="card-title"><b>Nama Ibu : </b>{{$student->motherName}}</h5> <br>
                    <h5 class="card-title"><b>Pekerjaan Ayah : </b>{{$student->fatherJob}}</h5> <br>
                    <h5 class="card-title"><b>Pekerjaan Ibu : </b>{{$student->motherJob}}</h5> <br>
                    <h5 class="card-title"><b>Pembimbing Sekolah : </b>{{$student->schoolAdvisor->name}}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-end">
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary px-5">Edit</a>
    </div>
</div>
@endsection
