@extends('layouts.app')

@section('content')

<div class="p-5">
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
            <th><a href="/cetak/{{$data->id}}" class="btn btn-primary">Cetak</a></th>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
  @endsection