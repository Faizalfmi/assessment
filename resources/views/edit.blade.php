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
                <h3>Ubah Formulir Pendaftaran</h3>
                <p class="blue-text">Masukkan informasi yang ingin diubah.</p>
                <div class="card">
                    
                    <form class="form-card" action="/edit/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                
                                <input type="text" id="id_user" name="id_user" placeholder="Masukkan nama lengkap" value="{{$data->id_user}}" hidden > 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nama Lengkap (Sesuai Ijazah)
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" value="{{$data->nama}}" > 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">NIK KTP
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="nik" name="nik" placeholder="Masukkan NIK KTP" pattern="[0-9+]+" maxlength="16"  title="Hanya boleh angka dan karakter +" value="{{$data->nik}}"  > 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Alamat Sekarang
                                    <span class="text-danger"> *</span>
                                </label> 
                                <textarea id="sekarang" name="sekarang" placeholder="" >
                                    {{$data->alamat_sekarang}}
                                </textarea> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Alamat KTP
                                    <span class="text-danger"> *</span>
                                </label> 
                                <textarea id="ktp" name="ktp" placeholder="" >
                                    {{$data->alamat_ktp}}
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
                                    <option value="{{ $provinsi->id }}" @if($provinsi->id == $data->id_provinsi) selected @endif>{{ $provinsi->provinsi }}</option>
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
                                    <option value="" selected disabled>Pilih Provinsi Dulu</option>                           
                                </select> 
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script>
                        $(document).ready(function() {
                            $('#provinsi').on('change', function() {
                                var provID = $(this).val();
                                if (provID) {
                                    $.ajax({
                                        url: '/getKota/' + provID,
                                        type: "GET",
                                        data: { "_token": "{{ csrf_token() }}" },
                                        dataType: "json",
                                        success: function(data) {
                                            if (data) {
                                                $('#kota').empty();
                                                $('#kota').append('<option value="" selected disabled>Pilih Kota</option>'); 
                                                $.each(data, function(id, kota) {
                                                    $('select[name="kota"]').append('<option value="' + kota.id + '">' + kota.kota + '</option>');
                                                });

                                                
                                                var selectedCityID = "{{ $data->id_kota }}";
                                                $('select[name="kota"]').val(selectedCityID);

                                            } else {
                                                $('#kota').empty();
                                            }
                                        }
                                    });
                                } else {
                                    $('#kota').empty();
                                }
                            });

                            
                            $('#provinsi').trigger('change');
                        });



                        </script>
                        
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Kecamatan
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="kecamatan" name="kecamatan" placeholder="Masukkan kecamatan" value="{{$data->kecamatan}}"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nomor telepon
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" value="{{$data->telepon}}" pattern="[0-9+]+" title="Hanya boleh angka dan karakter +"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Nomor HP
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="text" id="hp" name="hp" placeholder="Masukkan nomor HP" value="{{$data->hp}}" pattern="[0-9+]+" title="Hanya boleh angka dan karakter +"> 
                            </div>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $("#hp").on("blur", function() {
                                    var inputVal = $(this).val();
                                    var regex = /^[0-9+]+$/;

                                    if (!regex.test(inputVal)) {
                                        alert("Nomor HP hanya boleh terdiri dari angka dan karakter +");
                                        $(this).val(""); // Bersihkan nilai input jika tidak valid
                                    }
                                });
                            });
                            $(document).ready(function() {
                                $("#telepon").on("blur", function() {
                                    var inputVal = $(this).val();
                                    var regex = /^[0-9+]+$/;

                                    if (!regex.test(inputVal)) {
                                        alert("Nomor HP hanya boleh terdiri dari angka dan karakter +");
                                        $(this).val(""); // Bersihkan nilai input jika tidak valid
                                    }
                                });
                            });
                        </script>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Email
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="email" id="email" name="email" placeholder="Masukkan Email"  value="{{$data->email}}"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Kewarganegaraan
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kewargaan" name="kewargaan" placeholder="">
                                    <option value="Pilih Kewarganegaraan Anda" disabled selected>Pilih Kewarganegaraan Anda</option>
                                    <option value="WNI Asli" {{ $data->kewargaan == "WNI Asli" ? 'selected' : " " }}>WNI Asli</option>
                                    <option value="WNI Keturunan" {{ $data->kewargaan == "WNI Keturunan" ? 'selected' : " " }}>WNI Keturunan</option>
                                    <option value="WNA" {{ $data->kewargaan == "WNA" ? 'selected' : " " }}>WNA</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Tanggal Lahir (Sesuai Ijazah)
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="date" id="tgl_lahir" name="tgl_lahir" value="{{$data->tgl_lahir}}"> 
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
                                    <option value="{{ $provinsi->id }}" @if($provinsi->id == $data->provinsi_lahir) selected @endif>{{ $provinsi->provinsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Kabupaten/Kota
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kota_lahir" name="kota_lahir" placeholder="">
                                    <option value="" selected disabled>Pilih Provinsi Dulu</option>
                                    
                                </select>
                            </div>
                            
                        </div>

                        {{-- Dropdown kota --}}
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <script>
                        $(document).ready(function() {
                            $('#provinsi_lahir').on('change', function() {
                                var provID = $(this).val();
                                if (provID) {
                                    $.ajax({
                                        url: '/getKota/' + provID,
                                        type: "GET",
                                        data: { "_token": "{{ csrf_token() }}" },
                                        dataType: "json",
                                        success: function(data) {
                                            if (data) {
                                                $('#kota_lahir').empty();
                                                $('#kota_lahir').append('<option value="" selected disabled>Pilih Kota</option>'); // Default option
                                                $.each(data, function(id, kota) {
                                                    $('select[name="kota_lahir"]').append('<option value="' + kota.id + '">' + kota.kota + '</option>');
                                                });

                                                var selectedCityName = "{{ $data->kota_lahir }}";
                                                $('select[name="kota_lahir"]').val(selectedCityName); // Set default value

                                            } else {
                                                $('#kota_lahir').empty();
                                            }
                                        }
                                    });
                                } else {
                                    $('#kota_lahir').empty();
                                }
                            });

                            $('#provinsi_lahir').trigger('change');
                        });

                        </script>

                        
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label px-3 text-md-start">Jenis Kelamin
                                    <span class="text-danger"> *</span>
                                </label> 
                                <select id="kelamin" name="kelamin" placeholder="">
                                    <option value="Jenis Kelmain" disabled selected>Jenis Kelamin</option>
                                    <option value="Pria" {{ $data->kelamin == "Pria" ? 'selected' : " " }}>Pria</option>
                                    <option value="Wanita" {{ $data->kelamin == "Wanita" ? 'selected' : " " }}>Wanita</option>
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
                                    <option value="Menikah" {{ $data->status == "Menikah" ? 'selected' : " " }}>Menikah</option>
                                    <option value="Belum Menikah" {{ $data->status == "Belum Menikah" ? 'selected' : " " }}>Belum Menikah</option>
                                    <option value="Lain-lain" {{ $data->status == "Lain-lain" ? 'selected' : " " }}>Lain-lain (janda/duda)</option>
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
                                    <option value="Islam" {{ $data->agama == "Islam" ? 'selected' : " " }}>Islam</option>
                                    <option value="Kristen" {{ $data->agama == "Kristen" ? 'selected' : " " }}>Kristen</option>
                                    <option value="Katolik" {{ $data->agama == "Katolik" ? 'selected' : " " }}>Katolik</option>
                                    <option value="Hindu" {{ $data->agama == "Hindu" ? 'selected' : " " }}>Hindu</option>
                                    <option value="Budha" {{ $data->agama == "Budha" ? 'selected' : " " }}>Budha</option>
                                    <option value="Lain-lain" {{ $data->agama == "Lain-lain" ? 'selected' : " " }}>Lain-lain</option>
                                </select> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left py-3">
                            <div class="form-group col-12 flex-column d-flex"> 
                                <label class="form-control-label text-md-start px-3">Foto
                                    <span class="text-danger"> *</span>
                                </label> 
                                <input type="file" id="picture" name="picture" placeholder=""> 
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">Update</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
     
      
</div>

@endsection
