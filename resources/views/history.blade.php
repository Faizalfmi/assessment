@extends('layouts.app')

@section('content')

<div class="p-5">
    <table class="table">
        <thead class="table-dark">
          <tr>
            <th>
              Kolom
          </th>
          <th>
              Data
          </th>
           
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
              <td><a href="/cetak/{{$data->id}}" class="btn btn-primary">Cetak</a></td>
          </tr>
            
            
          
          @endforeach
        </tbody>
      </table>
      <div class="flex justify-end mt-4 p-5">
        {{ $data2->links() }}
    </div>

    <div class="flex justify-center mt-4">
        <p class="text-gray-500">
            Showing {{ $data2->firstItem() }} to {{ $data2->lastItem() }} of {{ $data2->total() }} results
        </p>
    </div>
</div>
  @endsection