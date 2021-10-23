<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    protected $fillable =['id_sub_kegiatan','nama_rincian'];
    protected $table = 'rincian_subk_kegiatan';

     public function sub_kegiatan(){ 
        return $this->belongsTo(\App\Sub_kegiatan::class,'id_sub_kegiatan','id');  
    }
}
