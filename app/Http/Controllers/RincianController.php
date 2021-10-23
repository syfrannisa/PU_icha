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
        $rincian = Rincian::with('sub_kegiatan')->paginate(10);
        return view('admin.rincian.index', compact('rincian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_kegiatan = Sub_kegiatan::all();
        return view('admin.rincian.create', compact('sub_kegiatan'));
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
                'id_sub_kegiatan'       => 'required',
                'nama_rincian' => 'required',
            );

            $messages = [
                'id_sub_kegiatan.required'       => 'Sub Kegiatan tidak boleh kosong!',
                'nama_rincian.required' => 'Rincian tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           //$rincian = Rincian::create([
            //'id_sub_kegiatan'       => $request->id_sub_kegiatan,
            //'nama_rincian' => $request->nama_rincian,
           //]);

            $rincian = new Rincian;
            $rincian->id_sub_kegiatan = $request->id_sub_kegiatan;
            $rincian->nama_rincian = $request->nama_rincian;
            $rincian->save();
           
            $data_pbj = new Data_pbj;
            $data_pbj->id_rincian = $rincian->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('rincian.index')->with('success','Data Anda Berhasil diSimpan');
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
        $sub_kegiatan = Sub_kegiatan::all();
        $rincian = Rincian::findOrfail($id);
        return view('admin.rincian.edit', compact('rincian','sub_kegiatan'));
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
                'id_sub_kegiatan' => 'required',
                'nama_rincian' => 'required',
            );

            $messages = [
                'id_sub_kegiatan.required'       => 'Sub Kegiatan tidak boleh kosong!',
                'nama_rincian.required'       => 'Rincian tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $rincian = Rincian::findOrfail($id);

            $rincian->id_sub_kegiatan = $request->id_sub_kegiatan ;
            $rincian->nama_rincian = $request->nama_rincian;

            $rincian->save();

            return redirect()->route('rincian.index')->with('success','Data Anda Berhasil diUpdate'); 
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
