<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_rincian extends Model
{
    protected $fillable =['id_rincian','nama_sub_rincian'];
    protected $table = 'sub_rincian';

     public function rincian(){ 
        return $this->belongsTo(\App\Rincian::class,'id_rincian','id'); 
    }
}
