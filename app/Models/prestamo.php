<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    use HasFactory;

    public function pagos(){
        return $this->hasMany('App\Models\pago');
    }
        
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
