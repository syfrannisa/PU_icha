<?php

namespace App\Http\Controllers;

use App\Sub_kegiatan;
use App\Kegiatan;
use App\Program;
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
        $sub_kegiatan = Sub_kegiatan::with('pptk')->get();
        return view('admin.sub_kegiatan.index', compact('sub_kegiatan'));
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
        $kegiatan = Kegiatan::where('id_laporan',$id_laporan)->get();
        return view('admin.sub_kegiatan.form', compact('kegiatan','status','id_laporan'));
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
                'nama_sub_kegiatan' => 'required',
            );

            $messages = [
                'nama_sub_kegiatan.required' => 'Sub Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }


           $id_laporan = $request->id_laporan;
           $subkegiatan = new Sub_kegiatan;
           $subkegiatan->id_laporan = $id_laporan;
           $subkegiatan->id_kegiatan = $request->id_kegiatan;
           $subkegiatan->nama_sub_kegiatan = $request->nama_sub_kegiatan;
           $subkegiatan->pagu_anggaran = $request->pagu_anggaran;
           $subkegiatan->nilai_kontrak = $request->nilai_kontrak;
           $subkegiatan->rupiah = $request->rupiah;
           $subkegiatan->sisa_dana = $request->sisa_dana;
           $subkegiatan->save();

            return redirect()->route('laporan.show',$id_laporan)->with('success','Data Anda Berhasil Update');
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
        $kegiatan = Kegiatan::where('id_laporan',$id_laporan)->get();
        $data = Sub_kegiatan::firstWhere('id',$id);
        return view('admin.sub_kegiatan.form', compact('data','kegiatan','status','id_laporan'));
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
                'nama_sub_kegiatan' => 'required',
            );

            $messages = [
                'nama_sub_kegiatan.required'       => 'Sub Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
           $subkegiatan = Sub_kegiatan::firstWhere('id',$id);
           $subkegiatan->id_kegiatan = $request->id_kegiatan;
           $subkegiatan->id_laporan = $id_laporan;
           $subkegiatan->nama_sub_kegiatan = $request->nama_sub_kegiatan;
           $subkegiatan->pagu_anggaran = $request->pagu_anggaran;
           $subkegiatan->nilai_kontrak = $request->nilai_kontrak;
           $subkegiatan->rupiah = $request->rupiah;
           $subkegiatan->sisa_dana = $request->sisa_dana;
           $subkegiatan->save();

            return redirect()->route('laporan.show',$id_laporan)->with('success','Data Anda Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $id_laporan = $request->id_laporan;
        $sub_kegiatan = Sub_kegiatan::firstWhere('id',$id);
        $sub_kegiatan->delete();

        return redirect()->route('laporan.show',$id_laporan)->with('success','Data Berhasil Dihapus');
    }
}
