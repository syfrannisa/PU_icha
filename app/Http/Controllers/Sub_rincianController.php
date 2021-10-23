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
        $sub_rincian = Sub_rincian::with('rincian')->paginate(10);
        return view('admin.sub_rincian.index', compact('sub_rincian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rincian = Rincian::all();
        return view('admin.sub_rincian.create', compact('rincian'));
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
                'id_rincian'       => 'required',
                'nama_sub_rincian' => 'nullable',
            );

            $messages = [
                'id_rincian.required'       => 'Rincian tidak boleh kosong!',
                'nama_sub_rincian.nullable' 
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           // $program = Data::create([
           //  'id_program'       => $request->id_kpa,
           //  'nama_program' => $request->nama_program,
           
           // ]);
            $sub_rincian = new Sub_rincian;
            $sub_rincian->id_rincian = $request->id_rincian;
            $sub_rincian->nama_sub_rincian = $request->nama_sub_rincian;
            $sub_rincian->save();

            $data_pbj = new Data_pbj;
            $data_pbj->id_sub_rincian = $sub_rincian->id;
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
            $data_pbj->catatan_masalah = $request->catatan_masalah;

            $data_pbj->save();

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('sub_rincian.index')->with('success','Data anda berhasil disimpan'); 
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
        $rincian = Rincian::all();
        $sub_rincian = Sub_rincian::findOrfail($id);
        return view('admin.sub_rincian.edit', compact('sub_rincian','rincian'));
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
                'id_rincian' => 'required',
                'nama_sub_rincian' => 'nullable',
            );

            $messages = [
                'id_rincian.required'       => 'Rincian tidak boleh kosong!',
                'nama_sub_rincian.nullable'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $sub_rincian = Sub_rincian::findOrfail($id);


            $sub_rincian->id_rincian = $request->id_rincian ;
            $sub_rincian->nama_sub_rincian = $request->nama_sub_rincian;
            $sub_rincian->pagu_anggaran = $request->pagu_anggaran;
            $sub_rincian->nilai_kontrak = $request->nilai_kontrak;
            $sub_rincian->pelaksana = $request->pelaksana;
            $sub_rincian->nomor_kontrak = $request->nomor_kontrak;
            $sub_rincian->mulai = $request->mulai;
            $sub_rincian->selesai = $request->selesai;
            $sub_rincian->sistem_pengadaan = $request->sistem_pengadaan;
            $sub_rincian->fisik = $request->fisik;
            $sub_rincian->rupiah = $request->rupiah;
            $sub_rincian->sisa_dana = $request->pagu_anggaran-$request->rupiah;
            $sub_rincian->catatan_masalah = $request->catatan_masalah;

            
            $sub_rincian->save();

            //$data = Data::firstWhere('id_program',$program->id);
            //$data->pagu_anggaran = $request->pagu_anggaran;
            //$data->save();

            return redirect()->route('sub_rincian.index')->with('success','Data anda berhasil update');
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
