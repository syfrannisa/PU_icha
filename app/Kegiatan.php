<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];
    protected $table = 'kegiatan';

     public function program(){
        // return $this->belongsTo('App\Bidang'); //tidak di sarankan  
        // return $this->belongsTo('App\Bidang','id_bidang','id');  
        return $this->hasMany(\App\Program::class,'id_program','id');  
    }

    public function subkegiatan(){
        return $this->hasMany(\App\Sub_kegiatan::class,'id_kegiatan','id');  
    }
}
