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
<div class="container">
        <table class="table">
            <thead class="table-dark">
              <tr>
                <th>Kolom</th>
                <th>Data</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($data2 as $data)
              
                <tr>
                    <td>Foto</td>
                    <td><img src="{{ asset('storage/'.$data->picture) }}" width="100px" alt=""></td>
                </tr>
                  
                  <tr>
                    <td>
                        Nama
                    </td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat_KTP</td>
                    <td>{{ $data->alamat_ktp}}</td>
                </tr>
                <tr>
                    <td>Alamat Sekarang</td>
                    <td>{{ $data->alamat_sekarang}}</td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $data->kecamatan}}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>{{ $data->nama_kota}}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $data->nama_provinsi}}</td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td>{{ $data->telepon}}</td>
                </tr>
                <tr>
                    <td>No HP</td>
                    <td>{{ $data->hp}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $data->email}}</td>
                </tr>
                <tr>
                    <td>Kewarganegaraan</td>
                    <td>{{ $data->kewargaan}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $data->tgl_lahir}}</td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten Tempat Lahir</td>
                    <td>{{ $data->nama_kota_lahir}}</td>
                </tr>
                <tr>
                    <td>Provinsi Tempat Lahir</td>
                    <td>{{ $data->nama_provinsi_lahir}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>{{ $data->kelamin}}</td>
                </tr>
                <tr>
                    <td>Status Pernikahah</td>
                    <td>{{ $data->status}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>{{ $data->agama}}</td>
                </tr>
                <tr>
                    <td>Action</td>
                    <td><div class="flex justifiy-between">
                        <a href="/edit/{{$data->id}}" class="btn btn-primary">Edit</a>
                        <a href="/hapus/{{$data->id}}" class="btn btn-danger">Hapus</a></td>
                    </div>
                    
                </tr>
                    
                
              
              @endforeach
            </tbody>
          </table>
      
          <div >
            {{ $data2->links() }}
        </div>
        <div class="flex justify-center mt-4">
            <p class="text-gray-500">
                Showing {{ $data2->firstItem() }} to {{ $data2->lastItem() }} of {{ $data2->total() }} results
            </p>
        </div>
    </div>
        
      @endif

@endsection
