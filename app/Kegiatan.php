<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable =['id_program','nama_kegiatan'];
    protected $table = 'kegiatan';

     public function program(){
        // return $this->belongsTo('App\Bidang'); //tidak di sarankan  
        // return $this->belongsTo('App\Bidang','id_bidang','id');  
        return $this->belongsTo(\App\Program::class,'id_program','id');  
    }
}
