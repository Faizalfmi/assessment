<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_provinsi',
        'kota',
        
    ];

    public function form() {
        return $this->hasMany(Form::class);
        }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
