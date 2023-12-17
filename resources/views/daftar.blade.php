@extends('layouts.app')

@section('content')

<style>
    body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0; font-weight:bold}input, textarea, button, select{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus, select:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
</style>
@include ('alert')
    
<div class="container">
     
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
    @endif
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3>Formulir Pendaftaran</h3>
                <p class="blue-text">Masukkan informasi anda.</p>
                <div class="card">
                    <h5 class="text-center mb-4">Masukkan Informasi Dengan Sebenar-benarnya</h5>
                    <form class="form-card" action="/daftar" method="post">
                        @csrf
                        @method('post')
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nama Lengkap (Sesuai Ijazah)
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" > 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Alamat Sekarang
                                    <span class="text-danger"> *</span>
                                </label> 
                                <textarea id="sekarang" name="sekarang" placeholder="" >
                                </textarea> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Alamat KTP
                                    <span class="text-danger"> *</span>
                                </label> 
                                <textarea id="ktp" name="ktp" placeholder="" >
                                </textarea> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Provinsi
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="provinsi" name="provinsi" placeholder="">
                                    <option value="" selected disabled>Pilih Provinsi</option>
                                    @foreach ($provinsi as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->provinsi}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Kabupaten/Kota
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kota" name="kota" placeholder="">
                                    <option value="" selected disabled>Pilih Kota/Kabupaten</option>
                                    @foreach ($kota as $kota)
                                    <option value="{{$kota->id}}">{{$kota->kota}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Kecamatan
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="kecamatan" name="kecamatan" placeholder="Masukkan kecamatan" onblur="validate(1)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nomor telepon
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" onblur="validate(1)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nomor HP
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="hp" name="hp" placeholder="Masukkan nomor HP" onblur="validate(1)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Email
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="email" id="email" name="email" placeholder="Masukkan Email" onblur="validate(1)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Kewarganegaraan
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kewargaan" name="kewargaan" placeholder="">
                                    <option value="Pilih Kewarganegaraan Anda" disabled selected>Pilih Kewarganegaraan Anda</option>
                                    <option value="WNI Asli">WNI Asli</option>
                                    <option value="WNI Keturunan">WNI Keturunan</option>
                                    <option value="WNA">WNA</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Tanggal Lahir (Sesuai Ijazah)
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="date" id="tgl_lahir" name="tgl_lahir" onblur="validate(1)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <label class="form-control-label px-3 text-md-start">Tempat Lahir (Sesuai Ijazah)
                                <span class="text-danger"> *</span>
                            </label> 
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Provinsi
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="provinsi_lahir" name="provinsi_lahir" placeholder="">
                                    <option value="Provinsi Lahir" selected disabled>Pilih Provinsi Lahir</option>
                                    @foreach ($provinsi2 as $provinsi)
                                    <option value="{{$provinsi->id}}">{{$provinsi->provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Kabupaten/Kota
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kota_lahir" name="kota_lahir" placeholder="">
                                    <option value="" selected disabled>Pilih Kota/Kabupaten Lahir</option>
                                    @foreach ($kota2 as $kota)
                                    <option value="{{$kota->id}}">{{$kota->kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Bila lahir di luar negeri sebutkan negaranya
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="lahir_luar" name="lahir_luar" placeholder=""> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Jenis Kelamin
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kelamin" name="kelamin" placeholder="">
                                    <option value="Jenis Kelmain" disabled selected>Jenis Kelamin</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Status Menikah
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="status" name="status" placeholder="">
                                    <option value="Jenis Kelmain" disabled selected>Status</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Lain-lain">Lain-lain (janda/duda)</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Agama
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="agama" name="agama" placeholder="">
                                    <option value="" disabled selected>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Daftar</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
     
      
</div>
@endsection
