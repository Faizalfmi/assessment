<!DOCTYPE html>
<html>
    <style>
        #data-daftar {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        h1 {
            color: #31ccce;
            text-align: center
        }
        p {
            color: #609f9f
        }
        #waktu {
            color: darkgray
        }
        
        #data-daftar td, #data-daftar th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #data-daftar tr:nth-child(even){background-color: #f2f2f2;}
        
        #data-daftar tr:hover {background-color: #ddd;}
        
        #data-daftar th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #990b10;
          color: white;
        }
        </style>
<head>
    <title>Data Pendaftaran</title>
</head>
<body>
    <h1>Data Pendaftaran {{$data->nama}}</h1>
    <p style="text-align: center">Dibawah ini adalah data pendaftaran mahasiswa baru atas nama {{$data->nama}}.</p>
    <br>
    <table id="data-daftar">
        <thead>
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
        </tbody>
    </table>
    
    <br>
    <br>
    <p id="waktu">Data dicetak oleh {{Auth::user()->name}} pada {{$waktu}}</p>
   

</body>
</html>
