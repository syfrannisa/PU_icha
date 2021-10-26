<?php

namespace App\Http\Controllers;

use App\Data_pbj;
use App\Kpa;
use App\Program;
use App\Kegiatan;
use App\Pptk;
use App\Sub_kegiatan;
use App\Rincian;
use App\Sub_Rincian;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class Data_pbjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_pbj = Data_pbj::with(['kpa'])->get();
        // dd($sub_bidang);
        return view('admin.data_pbj.index', compact('data_pbj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kpa = Kpa::all();
        $program = Program::all();
        $kegiatan = Kegiatan::all();
        $pptk = Pptk::all();
        $sub_kegiatan = Sub_kegiatan::all();
        $rincian = Rincian::all();
        $sub_rincian = Sub_rincian::all();

        return view('admin.data_pbj.create', compact('kpa','program','kegiatan','pptk','sub_kegiatan','rincian','sub_rincian'));
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
                'id_kpa'           => 'required',
                'id_program'       => 'required',
                'id_kegiatan'      => 'required',
                'id_pptk'          => 'required',
                'id_sub_kegiatan'  => 'required',
                'id_rincian'       => 'required',
                'id_sub_rincian'   => 'required',
                'pagu_anggaran'    => 'required',

            );

            $messages = [
                'id_kpa.required'           => 'Kpa tidak boleh kosong!',
                'id_program.required'       => 'Program tidak boleh kosong!',
                'id_kegiatan.required'      => 'Kegiatan tidak boleh kosong!',
                'id_pptk.required'          => 'PPTK tidak boleh kosong!',
                'id_sub_kegiatan.required'  => 'Sub_kegiatan tidak boleh kosong!',
                'id_rincian.required'       => 'Rincian tidak boleh kosong!',
                'id_sub_rincian.required'   => 'Sub Rincian tidak boleh kosong!',
                'pagu_anggaran.required'    => 'Pagu Anggran tidak boleh kosong!'

            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           //$sub_kegiatan = Sub_kegiatan::create([
            //'id_pptk'       => $request->id_pptk,
            //'subkgt' => $request->subkgt,
           //]);

            $data_pbj = new Data_pbj;

            $data_pbj->id_kpa = $request->id_kpa;
            $data_pbj->id_program = $request->id_program;
            $data_pbj->id_kegiatan = $request->id_kegiatan;
            $data_pbj->id_pptk = $request->id_pptk;
            $data_pbj->id_sub_kegiatan = $request->id_sub_kegiatan;
            $data_pbj->id_rincian = $request->id_rincian;
            $data_pbj->id_sub_rincian = $request->id_sub_rincian;

            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->nilai_kontrak = $request->nilai_kontrak;
            $data_pbj->pelaksana = $request->pelaksana;
            $data_pbj->nomor_kontrak = $request->nomor_kontrak;
            $data_pbj->mulai = $request->mulai;
            $data_pbj->selesai = $request->selesai;
            $data_pbj->sistem_pengadaan = $request->sistem_pengadaan;
            $data_pbj->fisik = $request->fisik;
            $data_pbj->rupiah = $request->rupiah;
            $data_pbj->sisa_dana = $request->pagu_anggaran-$request->rupiah ;
            $data_pbj->catatan_masalah = $request->subkgt;

            $data_pbj->save();
           
           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('data_pbj.index')->with('success','Data anda berhasil disimpan'); 
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
    public function edit($id)
    {
        $kpa = Kpa::all();
        $program = Program::all();
        $kegiatan = Kegiatan::all();
        $pptk = Pptk::all();
        $sub_kegiatan = Sub_kegiatan::all();
        $rincian = Rincian::all();
        $sub_rincian = Sub_rincian::all();

        $data_pbj = Data_pbj::findOrfail($id);

        return view('admin.data_pbj.edit', compact('data_pbj','kpa','program','kegiatan','pptk','sub_kegiatan','rincian','sub_rincian'));
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
                'id_kpa'           => 'required',
                'id_program'       => 'required',
                'id_kegiatan'      => 'required',
                'id_pptk'          => 'required',
                'id_sub_kegiatan'  => 'required',
                'id_rincian'       => 'required',
                'id_sub_rincian'   => 'required',
                'pagu_anggaran'    => 'required',
            );

            $messages = [
                'id_kpa.required'           => 'Kpa tidak boleh kosong!',
                'id_program.required'       => 'Program tidak boleh kosong!',
                'id_kegiatan.required'      => 'Kegiatan tidak boleh kosong!',
                'id_pptk.required'          => 'PPTK tidak boleh kosong!',
                'id_sub_kegiatan.required'  => 'Sub_kegiatan tidak boleh kosong!',
                'id_rincian.required'       => 'Rincian tidak boleh kosong!',
                'id_sub_rincian.required'   => 'Sub Rincian tidak boleh kosong!',
                'pagu_anggaran.required'    => 'Pagu Anggran tidak boleh kosong!'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $data_pbj = Data_pbj::findOrfail($id);

            $data_pbj->id_kpa = $request->id_kpa;
            $data_pbj->id_program = $request->id_program;
            $data_pbj->id_kegiatan = $request->id_kegiatan;
            $data_pbj->id_pptk = $request->id_pptk;
            $data_pbj->id_sub_kegiatan = $request->id_sub_kegiatan;
            $data_pbj->id_rincian = $request->id_rincian;
            $data_pbj->id_sub_rincian = $request->id_sub_rincian;

            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->nilai_kontrak = $request->nilai_kontrak;
            $data_pbj->pelaksana = $request->pelaksana;
            $data_pbj->nomor_kontrak = $request->nomor_kontrak;
            $data_pbj->mulai = $request->mulai;
            $data_pbj->selesai = $request->selesai;
            $data_pbj->sistem_pengadaan = $request->sistem_pengadaan;
            $data_pbj->fisik = $request->fisik;
            $data_pbj->rupiah = $request->rupiah;
            $data_pbj->sisa_dana = $request->sisa_dana;
            $data_pbj->catatan_masalah = $request->subkgt;

            $data_pbj->save();

            return redirect()->route('data_pbj.index')->with('success','Data anda berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_pbj = Data_pbj::findorfail($id);
        $data_pbj->delete();

        return redirect()->back()->with('success','Data Berhasil dihapus');
    }
}
