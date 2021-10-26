<?php

namespace App\Http\Controllers;

use App\Pptk;
use App\Kpa;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PptkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pptk = Pptk::with('kpa')->get();
        return view('admin.pptk.index', compact('pptk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kpa = Kpa::all();
        return view('admin.pptk.create', compact('kpa'));
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
                'id_kpa'       => 'required',
                'nama_pptk' => 'required',
            );

            $messages = [
                'id_kpa.required'       => 'KPA tidak boleh kosong!',
                'nama_pptk.required' => 'PPTK tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           //$pptk = Pptk::create([
            //'id_kpa'       => $request->id_kpa,
            //'nama_pptk' => $request->nama_pptk,
           //]);

            $pptk = new Pptk;
            $pptk->id_kpa = $request->id_kpa;
            $pptk->nama_pptk = $request->nama_pptk;
            $pptk->save();
           
            $data_pbj = new Data_pbj;
            $data_pbj->id_pptk = $pptk->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('pptk.index')->with('success','Data anda berhasil disimpan'); 
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
        $pptk = Pptk::findOrfail($id);
        return view('admin.pptk.edit', compact('pptk','kpa'));
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
                'id_kpa' => 'required',
                'nama_pptk' => 'required',
            );

            $messages = [
                'id_kpa.required'       => 'KPA tidak boleh kosong!',
                'nama_pptk.required'       => 'PPTK tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           $pptk = Pptk::findOrfail($id);


             $pptk->id_kpa = $request->id_kpa ;
             $pptk->nama_pptk = $request->nama_pptk;

            $pptk->save();

            return redirect()->route('pptk.index')->with('success','Data anda berhasil update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pptk = Pptk::findorfail($id);
        $pptk->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
