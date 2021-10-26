<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_pbj extends Model
{
    // protected $fillable =['id_kpa','id_program','id_kegiatan','id_pptk','id_sub_kegiatan','id_rincian','id_sub_rincian','pagu_anggaran','nilai_kontrak','pelaksana','nomor_kontrak','mulia','selesai','sistem_pengadaan','fisik','rupiah','sisa_dana','catatan_masalah'];
    protected $table = 'data_pbj';

     public function kpa(){ 
        return $this->belongsTo(\App\Kpa::class,'id','id_kpa'); 
}

    public function program(){ 
        return $this->belongsTo(\App\Program::class,'id','id_program'); 
}

    public function kegiatan(){ 
        return $this->belongsTo(\App\Kegiatan::class,'id','id_kegiatan'); 
}

    public function pptk(){ 
        return $this->belongsTo(\App\Pptk::class,'id','id_pptk'); 
}

    public function sub_kegiatan(){ 
        return $this->belongsTo(\App\Sub_kegiatan::class,'id','id_sub_kegiatan'); 
}

    public function rincian(){ 
        return $this->belongsTo(\App\Rincian::class,'id','id_rincian'); 
}

    public function sub_rincian(){ 
        return $this->belongsTo(\App\Sub_rincian::class,'id','id_sub_rincian'); 
}
}