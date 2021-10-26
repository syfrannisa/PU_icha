<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    protected $table = 'rincian';

     public function sub_kegiatan(){ 
        return $this->belongsTo(\App\Sub_kegiatan::class,'id_sub_kegiatan','id');  
    }

    public function subrincian(){
        return $this->hasMany(\App\Sub_rincian::class,'id_rincian','id');  
    }
}
