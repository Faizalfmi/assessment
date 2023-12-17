<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_user',
        'alamat_ktp',
        'alamat_sekarang',
        'id_provinsi',
        'id_kota',
        'kecamatan',
        'telepon',
        'hp',
        'email',
        'kewargaan',
        'tgl_lahir',
        'provinsi_lahir',
        'kota_lahir',
        'kelamin',
        'agama',
        'status',
        
        
    ];


    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
