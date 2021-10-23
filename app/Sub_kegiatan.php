<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_kegiatan extends Model
{
    protected $fillable =['id_pptk','subkgt'];
    protected $table = 'sub_kegiatan';

     public function pptk(){ 
        return $this->belongsTo(\App\Pptk::class,'id_pptk','id');  
    }
}
