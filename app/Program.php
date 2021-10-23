<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable =['id_kpa','nama_program'];
    protected $table = 'program';

     public function kpa(){
        // return $this->belongsTo('App\Bidang'); //tidak di sarankan  
        // return $this->belongsTo('App\Bidang','id_bidang','id');  
        return $this->belongsTo(\App\Kpa::class,'id_kpa','id');  
    }
}