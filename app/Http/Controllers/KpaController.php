<?php

namespace App\Http\Controllers;

use App\Kpa;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KpaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kpa = Kpa::get();
        return view('admin.kpa.index', compact('kpa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kpa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kpa' => 'required:3'
        ]);

        $kpa = Kpa::create([
            'nama_kpa' => $request->nama_kpa,
        ]);

            $data_pbj = new Data_pbj;
            $data_pbj->id_kpa = $kpa->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();   

        return redirect() ->back()->with('success','Data Kpa berhasil disimpan');
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
        $kpa= Kpa::findorfail($id);
        return view('admin.kpa.edit', compact('kpa'));
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
        $this->validate($request, [
            'nama_kpa' => 'required'     
        ]);

        $kpa_data = [
            'nama_kpa' => $request->nama_kpa,
        ];
                 
        kpa::whereId($id)->update($kpa_data);

        return redirect()->route('kpa.index')->with('success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kpa = Kpa::findorfail($id);
        $kpa->delete();

        return redirect()->back()->with('success','Data Berhasil di Hapus');
    }
}
