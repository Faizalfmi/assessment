@extends('layouts.app')

@section('content')

<div class="container">
    @include ('alert')
     @if (Auth::user()->role == 'user')
  
    <div class="container-fluid px-4 py-5 my-5 text-center">
        <div class="lc-block mb-4">
            <div editable="rich">
                <h2 class="display-2 fw-bold">Daftar Kuliah di <span class="text-primary">Telkom University</span></h2>
            </div>
        </div>
        <div class="lc-block col-lg-6 mx-auto mb-5">
            <div editable="rich">
    
                <p class="lead">Di Telkom University, 
                    Anda akan menemukan lingkungan yang mendukung, fakultas yang berpengalaman, 
                    serta program-program pendidikan yang relevan dengan kebutuhan zaman ini.</p>
            </div>
        </div>
    
        <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center mb-5"> <a class="btn btn-primary btn-lg px-4 gap-3" href="{{route('daftar')}}" role="button">Daftar</a>
            <a class="btn btn-outline-secondary btn-lg px-4" href="#video" role="button">Learn more</a>
        </div>
        <div class="lc-block d-grid gap-2 d-sm-flex justify-content-sm-center">
            <img class="img-fluid" src="{{asset('assets/img/tult.jpg')}}" width="500" height="" srcset="" sizes="" alt="">
        </div>
    </div>
     <section id="video">
 
  
    
        <div class="container py-5">
            <div class="row mb-4 align-items-center flex-lg-row-reverse">
                <div class="col-md-6 col-xl-7 mb-4 mb-lg-0 " style="">
                    <!-- requires glightbox, please flag the option in the picostrap customizer panel-->
        
        
                    <div class="lc-block position-relative"><iframe width="675" height="392" src="https://www.youtube.com/embed/OYDzRuEuZjE" title="Daftar ke Telkom University? Mudah ! ini panduannya" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <a class="position-absolute top-50 start-50 translate-middle glightbox d-flex justify-content-center align-items-center" href="https://www.youtube.com/watch?v=BKgpLOUYZJ4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5em" height="5em" fill="currentColor" class="text-white" viewBox="0 0 16 16" lc-helper="svg-icon">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"></path>
                            </svg>
                        </a>
                    </div>
                </div><!-- /col -->
                <div class="col-md-6 col-xl-5">
                    <div class="lc-block mb-3">
                        <div editable="rich">
                            <h1 class="fw-bolder display-2">Proses Pendaftaran Mudah</h1>
                        </div>
                    </div><!-- /lc-block -->
                    <!-- /lc-block -->
        
        
                    <div class="lc-block mb-4">
                        <div editable="rich">
        
                            <p class="lead">Proses untuk mendaftar menjadi mahasiswa Telkom University dapat dilakukan dengan mudah. Tonton video di samping untuk caranya.</p>
        
                        </div>
                    </div>
                   
                </div><!-- /col -->
            </div>
        </div>
         
                 
     </section>
     
      
</div>
@else
      
        <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Nama</th>
                <th>Alamat skrg</th>
                <th>Alamat KTP</th>
                <th>provinsi</th>
                <th>kota</th>
                <th>kecamatan</th>
                <th>telepon</th>
                <th>hp</th>
                <th>email</th>
                <th>kewargaan</th>
                <th>tgl lahir</th>
                <th>provinsi lahir</th>
                <th>kota lahir</th>
                <th>kelamin</th>
                <th>status</th>
                <th>agama</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data2 as $data)
              <tr>
                <th>{{$data->nama}}</th>
                <th>{{$data->alamat_sekarang}}</th>
                <th>{{$data->alamat_ktp}}</th>
                <th>{{$data->nama_provinsi}}</th>
                <th>{{$data->nama_kota}}</th>
                <th>{{$data->kecamatan}}</th>
                <th>{{$data->telepon}}</th>
                <th>{{$data->hp}}</th>
                <th>{{$data->email}}</th>
                <th>{{$data->kewargaan}}</th>
                <th>{{$data->tgl_lahir}}</th>
                <th>{{$data->nama_provinsi_lahir}}</th>
                <th>{{$data->nama_kota_lahir}}</th>
                <th>{{$data->kelamin}}</th>
                <th>{{$data->status}}</th>
                <th>{{$data->agama}}</th>
                <th></th>
              </tr>
              @endforeach
            </tbody>
          </table>
      

      @endif
@endsection
