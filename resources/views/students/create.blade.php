@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
    <h1>Tambah Siswa</h1>
@stop

@section('content')

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id">NISN</label>
            <input type="number" class="form-control" id="id" name="id" value="{{ old('id') }}" required>
            @error('id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Siswa</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="class">Kelas</label>
            <select name="class" id="class" autocomplete="off" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                <option value="10"  {{ old('class') == '10' ? 'selected' : '' }} >10</option>
                <option value="11"  {{ old('class') == '11' ? 'selected' : '' }} >11</option>
                <option value="12"  {{ old('class') == '12' ? 'selected' : '' }} >12</option>
            </select>
            @error('class')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="major_id">Jurusan</label>
            <select name="major_id" id="major_id" autocomplete="off" class="form-control" required>
            <option value="" disabled selected>Pilih Jurusan</option>
                @foreach ($majors as $major )
                    <option value="{{$major->id}}">{{$major->name}}</option>
                @endforeach
            </select>
            @error('major_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="school_id">Nama Sekolah</label>
            <select name="school_id" id="school_id" autocomplete="off" class="form-control" required>
            <option value="" disabled selected>Pilih Sekolah</option>
                @foreach ($schools as $school )
                    <option value="{{$school->id}}">{{$school->name}}</option>
                @endforeach
            </select>
            @error('school_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="phoneNumber">Nomor Kontak</label>
            <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" pattern="^0[0-9]{9,12}$" required placeholder="Contoh: 081234567890" value="{{ old('phoneNumber') }}">
            @error('phoneNumber')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="profilePhoto">Foto Profil</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="profilePhoto" name="profilePhoto" required {{old('profilePhoto')}}>
                <label class="custom-file-label" for="profilePhoto">Pilih file</label>
            </div>
            @error('profilePhoto')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="fatherName">Nama Ayah</label>
            <input type="text" class="form-control" id="fatherName" name="fatherName" required value="{{ old('fatherName') }}">
            @error('fatherName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="fatherJob">Pekerjaan Ayah</label>
            <select name="fatherJob" id="" class="form-control" onchange="selectOptionChangeFather(this)" required>
                <option value="" disabled selected>Pilih Pekerjaan Ayah</option>
                <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Pengusaha">Pengusaha</option>
                <option value="Petani">Petani</option>
                <option value="Buruh">Buruh</option>
                <option value="TNI/POLRI">TNI/POLRI</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            @error('fatherJob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control mt-3" id="anotherFatherJobInput" name="anotherFatherJob" placeholder="Masukkan Pekerjaan Ayah" style=" display:none" value="{{old('anotherFatherJob')}}">
        </div>
        <div class="form-group">
            <label for="motherName">Nama Ibu</label>
            <input type="text" class="form-control" id="motherName" name="motherName" required value="{{ old('motherName') }}">
            @error('motherName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="motherJob">Pekerjaan Ibu</label>
            <select name="motherJob" id="" class="form-control" onchange="selectOptionChangeMother(this)" required>
                <option value="" disabled selected>Pilih Pekerjaan Ibu</option>
                <option value="Pegawai Negeri Sipil (PNS)">Pegawai Negeri Sipil (PNS)</option>
                <option value="Karyawan Swasta">Karyawan Swasta</option>
                <option value="Pengusaha">Pengusaha</option>
                <option value="Petani">Petani</option>
                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                <option value="Buruh">Buruh</option>
                <option value="TNI/POLRI">TNI/POLRI</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            @error('motherJob')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" class="form-control mt-3" id="anotherMotherJobInput" name="anotherMotherJob" placeholder="Masukkan Pekerjaan Ibu" style=" display:none" value="{{old('anotherMotherJob')}}">
        </div>

        <div class="form-group">
            <label for="schoolAdvisor_id">Pembimbing</label>
            
            <select name="schoolAdvisor_id" id="schoolAdvisor_id" autocomplete="off" class="form-control" required>
            <option value="" disabled selected>Pilih Pembimbing</option>
                @foreach ($schoolAdvisors as $schoolAdvisor )
                    <option value="{{$schoolAdvisor->id}}">{{$schoolAdvisor->name}}</option>
                @endforeach
            </select>
            @error('schoolAdvisor_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@stop

@section('js') 
    <script>
        
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("profilePhoto").files[0].name;
            var label = document.querySelector('.custom-file-label');
            label.innerText = fileName;
        });

        function selectOptionChangeFather(selectElemen) {
            let anotherFatherJobInput = document.getElementById('anotherFatherJobInput');

            if (selectElemen.value === 'Lainnya') {
                anotherFatherJobInput.style.display = 'block'
            } else {
                anotherFatherJobInput.style.display = 'none'
            }
        }
        
        function selectOptionChangeMother(selectElemen) {
            let anotherFatherMotherInput = document.getElementById('anotherMotherJobInput');

            if (selectElemen.value === 'Lainnya') {
                anotherMotherJobInput.style.display = 'block'
            } else {
                anotherMotherJobInput.style.display = 'none'
            }
        }
    </script>
@endsection
