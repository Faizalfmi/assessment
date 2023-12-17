<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinsi',
        
        
    ];

    public function form() {
        return $this->hasMany(Form::class);
        }
    
    public function city() {
        return $this->hasMany(City::class);
        }
}
