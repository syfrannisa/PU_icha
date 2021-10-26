<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_kegiatan extends Model
{
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    protected $table = 'sub_kegiatan';

     public function pptk(){ 
        return $this->belongsTo(\App\Pptk::class,'id_pptk','id');  
    }

    public function rincian(){
        return $this->hasMany(\App\Rincian::class,'id_sub_kegiatan','id');  
    }
}
