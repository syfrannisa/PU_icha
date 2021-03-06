<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

     public function kegiatan(){
        return $this->hasMany(\App\Kegiatan::class,'id_program','id');  
    }
}