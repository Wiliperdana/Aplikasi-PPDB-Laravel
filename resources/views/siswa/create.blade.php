@extends('layout.template')
@section('content')

<!-- START FORM -->
<form action='{{ url('siswa') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h3 class="text-center mb-4">PPDB SMK Brantas Karangkates</h3>
        <a href="{{ url('siswa') }}" class="btn btn-secondary">< Kembali</a>
            
        <!--NISN-->
        <div class="form-group">
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name='nisn' id="nisn" placeholder="NISN" value="{{Session::get('nisn')}}">
            </div>
        </div>

        <!--Nama Lengkap-->
        <div class="form-group">
            <label for="namalengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name='namalengkap' id="namalengkap" placeholder="Nama Lengkap" value="{{Session::get('namalengkap')}}">
            </div>
        </div>

        <!--Nama Panggilan-->
        <div class="form-group">
            <label for="namapanggilan" class="col-sm-2 col-form-label">Nama Panggilan</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name='namapanggilan' id="namapanggilan" placeholder="Nama Panggilan" value="{{Session::get('namapanggilan')}}">
            </div>
        </div>

        <!--Tempat Lahir-->
        <div class="form-group">
            <label for="tempatlahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name='tempatlahir' id="tempatlahir" placeholder="Tempat Lahir" value="{{Session::get('tempatlahir')}}">
            </div>
        </div>

        <!--Tanggal Lahir-->
        <div class="form-group">
            <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name='tanggallahir' id="tanggallahir" placeholder="Tanggal Lahir" onfocus="(this.type='date')" onblur="(this.type='text')" value="{{Session::get('tanggallahir')}}">
            </div>
        </div>

        <!--Email-->
        <div class="form-group">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name='email' id="email" placeholder="Email" value="{{Session::get('email')}}">
            </div>
        </div>

        <!--Password-->
        <div class="form-group">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" name='password' id="password" placeholder="Password" value="{{Session::get('password')}}">
            </div>
        </div>

        <!--Jurusan-->
        <div class="form-group col-sm-6">
            <label for="jurusan" class="col-form-label">Pilih Jurusan</label>
            <select class="form-select" name="jurusan" id="jurusan" value="{{Session::get('jurusan')}}">
                <option selected>Pilih Jurusan</option>
                <option value="TKRO">Teknik Kendaraan Ringan Otomotif</option>
                <option value="TBSM">Teknik Bisnis Sepeda Motor</option>
                <option value="TPM">Teknik Pemesinan</option>
                <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                <option value="TPTL">Teknik Pembangkit Tenaga Listrik</option>
                <option value="RPL">Rekayasa Perangkat Lunak</option>
                <option value="MM">Multimedia</option>
                <option value="TBG">Tata Boga</option>
                <option value="TBS">Tata Busana</option>
            </select>
        </div>

        <!--Alasan-->
        <label for="alasan" class="col-form-label">Alasan</label>
        <div class="form-floating col-sm-6">
            <textarea class="form-control" placeholder="Tuliskan Alasanmu" name="alasan" id="alasan" style="height: 100px;" value="{{Session::get('alasan')}}"></textarea>
        </div>

        <!--Jenis Kelamin-->
        <div class="form-group col-sm-3 mt-3">
            <label for="jeniskelamin" class="col-form-label">Jenis Kelamin</label>
            <select class="form-select" name="jeniskelamin" id="jeniskelamin" value="{{Session::get('jeniskelamin')}}">
                <option selected>Jenis Kelamin</option>
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <!--Hobi-->
        <div class="form-group">
            <label for="hobi" class="col-sm-2 col-form-label">Hobi</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name='hobi' id="hobi" placeholder="Hobi" value="{{Session::get('hobi')}}">
            </div>
        </div>

        <div class="mb-3 row mt-3">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
        
    </div>
</form>
<!-- AKHIR FORM -->

@endsection