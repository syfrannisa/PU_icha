<?php

namespace App\Http\Controllers;

use App\Sub_kegiatan;
use App\Pptk;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class Sub_kegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_kegiatan = Sub_kegiatan::with('pptk')->paginate(10);
        return view('admin.sub_kegiatan.index', compact('sub_kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pptk = Pptk::all();
        return view('admin.sub_kegiatan.create', compact('pptk'));
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
                'id_pptk'       => 'required',
                'subkgt' => 'required',
            );

            $messages = [
                'id_pptk.required'       => 'PPTK tidak boleh kosong!',
                'subkgt.required' => 'Sub Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           //$sub_kegiatan = Sub_kegiatan::create([
            //'id_pptk'       => $request->id_pptk,
            //'subkgt' => $request->subkgt,
           //]);

            $sub_kegiatan = new Sub_kegiatan;
            $sub_kegiatan->id_pptk = $request->id_pptk;
            $sub_kegiatan->subkgt = $request->subkgt;
            $sub_kegiatan->save();
           
            $data_pbj = new Data_pbj;
            $data_pbj->id_sub_kegiatan = $sub_kegiatan->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('sub_kegiatan.index')->with('success','Postingan anda berhasil disimpan'); 
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
        $pptk = Pptk::all();
        $sub_kegiatan = Sub_kegiatan::findOrfail($id);
        return view('admin.sub_kegiatan.edit', compact('sub_kegiatan','pptk'));
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
                'id_pptk' => 'required',
                'subkgt' => 'required',
            );

            $messages = [
                'id_pptk.required'       => 'PPTK tidak boleh kosong!',
                'subkgt.required'       => 'Sub Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $sub_kegiatan = Sub_kegiatan::findOrfail($id);

            $sub_kegiatan->id_pptk = $request->id_pptk ;
            $sub_kegiatan->subkgt = $request->subkgt;

            $sub_kegiatan->save();

            return redirect()->route('sub_kegiatan.index')->with('success','Postingan anda berhasil update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_kegiatan = Sub_kegiatan::findorfail($id);
        $sub_kegiatan->delete();

        return redirect()->back()->with('success','Posts Berhasil Dihapus');
    }
}
