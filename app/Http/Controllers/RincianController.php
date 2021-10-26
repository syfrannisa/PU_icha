<?php

namespace App\Http\Controllers;

use App\Rincian;
use App\Sub_kegiatan;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RincianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rincian = Rincian::with('sub_kegiatan')->get();
        return view('admin.rincian.index', compact('rincian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_laporan = $request->data_id;
        $status = 'Tambah';
        $subkegiatan = Sub_kegiatan::where('id_laporan',$id_laporan)->get();
        return view('admin.rincian.form', compact('subkegiatan','status','id_laporan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'nama_rincian' => 'required',
        );

        $messages = [
            'nama_rincian.required'       => 'Rincian tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $id_laporan = $request->id_laporan;
       $rincian = new Rincian;
       $rincian->id_laporan = $id_laporan;
       $rincian->id_sub_kegiatan = $request->id_sub_kegiatan;
       $rincian->nama_rincian = $request->nama_rincian;
       $rincian->pagu_anggaran = $request->pagu_anggaran;
       $rincian->nilai_kontrak = $request->nilai_kontrak;
       $rincian->rupiah = $request->rupiah;
       $rincian->sisa_dana = $request->sisa_dana;
       $rincian->pelaksana = $request->pelaksana;
        $rincian->nomor_kontrak = $request->nomor_kontrak;
        $rincian->mulai = $request->mulai;
        $rincian->selesai = $request->selesai;
        $rincian->sistem_pengadaan = $request->sistem_pengadaan;
        $rincian->fisik = $request->fisik;
        $rincian->catatan_masalah = $request->catatan_masalah;
       $rincian->save();

        return redirect()->route('laporan.show',$id_laporan)->with('success','Data Anda Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $id_laporan = $request->data_id;
        $status = 'Edit';
        $subkegiatan = Sub_kegiatan::where('id_laporan',$id_laporan)->get();
        $data = Rincian::firstWhere('id',$id);
        return view('admin.rincian.form', compact('data','subkegiatan','status','id_laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
                'nama_rincian' => 'required',
            );

            $messages = [
                'nama_rincian.required'       => 'Rincian tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
           $rincian = Rincian::firstWhere('id',$id);
           $rincian->id_laporan = $id_laporan;
           $rincian->id_sub_kegiatan = $request->id_sub_kegiatan;
           $rincian->nama_rincian = $request->nama_rincian;
           $rincian->pagu_anggaran = $request->pagu_anggaran;
           $rincian->nilai_kontrak = $request->nilai_kontrak;
           $rincian->rupiah = $request->rupiah;
           $rincian->sisa_dana = $request->sisa_dana;
           $rincian->pelaksana = $request->pelaksana;
            $rincian->nomor_kontrak = $request->nomor_kontrak;
            $rincian->mulai = $request->mulai;
            $rincian->selesai = $request->selesai;
            $rincian->sistem_pengadaan = $request->sistem_pengadaan;
            $rincian->fisik = $request->fisik;
            $rincian->catatan_masalah = $request->catatan_masalah;
           $rincian->save();

            return redirect()->route('laporan.show',$id_laporan)->with('success','Data Anda Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rincian = Rincian::findorfail($id);
        $rincian->delete();

        return redirect()->back()->with('success','Posts Berhasil Dihapus');
    }
}
