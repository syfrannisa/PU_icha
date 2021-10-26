<?php

namespace App\Http\Controllers;

use App\Sub_rincian;
use App\Rincian;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class Sub_rincianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_rincian = Sub_rincian::with('rincian')->get();
        return view('admin.sub_rincian.index', compact('sub_rincian'));
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
        $rincian = Rincian::where('id_laporan',$id_laporan)->get();
        return view('admin.sub_rincian.form', compact('rincian','status','id_laporan'));
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
            'nama_sub_rincian' => 'required',
        );

        $messages = [
            'nama_sub_rincian.required'       => 'Sub Rincian tidak boleh kosong!',
        ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
           $rincian = new Sub_rincian;
           $rincian->id_rincian = $request->id_rincian;
           $rincian->nama_sub_rincian = $request->nama_sub_rincian;
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
        $rincian = Rincian::where('id_laporan',$id_laporan)->get();
        $data = Sub_rincian::firstWhere('id',$id);
        return view('admin.sub_rincian.form', compact('data','rincian','status','id_laporan'));
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
            'nama_sub_rincian' => 'required',
        );

        $messages = [
            'nama_sub_rincian.required'       => 'Sub Rincian tidak boleh kosong!',
        ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
           $rincian = Sub_rincian::firstWhere('id',$id);
           $rincian->id_rincian = $request->id_rincian;
           $rincian->nama_sub_rincian = $request->nama_sub_rincian;
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
        $sub_rincian = Sub_rincian::findorfail($id);
        $sub_rincian->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
