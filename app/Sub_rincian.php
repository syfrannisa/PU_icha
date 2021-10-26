<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_rincian extends Model
{
    protected $table = 'sub_rincian';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    
     public function rincian(){ 
        return $this->belongsTo(\App\Rincian::class,'id_rincian','id'); 
    }

    public function data_pbj(){ 
        return $this->belongsTo(\App\Data_pbj::class,'id','id_sub_rincian'); 
    }
}
