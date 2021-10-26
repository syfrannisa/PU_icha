<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Program;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::with('program')->get();
        return view('admin.kegiatan.index', compact('kegiatan'));
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
        $program = Program::where('id_laporan',$id_laporan)->get();
        return view('admin.kegiatan.form', compact('program','status','id_laporan'));
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
                'id_program'       => 'required',
                'nama_kegiatan' => 'required',
            );

            $messages = [
                'id_program.required'       => 'Program tidak boleh kosong!',
                'nama_kegiatan.required' => 'Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }
            $id_laporan = $request->id_laporan;
            $kegiatan = new Kegiatan;
           $kegiatan->id_laporan = $id_laporan;
           $kegiatan->id_program = $request->id_program;
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->nama_pptk = $request->nama_pptk;
            $kegiatan->pagu_anggaran = $request->pagu_anggaran;
            $kegiatan->nilai_kontrak = $request->nilai_kontrak;
            $kegiatan->rupiah = $request->rupiah;
            $kegiatan->sisa_dana = $request->sisa_dana;
            $kegiatan->save();

            return redirect()->route('laporan.show',$id_laporan)->with('success','Data Anda Berhasil diSimpan'); 
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
        $program = Program::where('id_laporan',$id_laporan)->get();
        $data = Kegiatan::firstWhere('id',$id);
        return view('admin.kegiatan.form', compact('data','program','status','id_laporan'));
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
                'id_program' => 'required',
                'nama_kegiatan' => 'required',
            );

            $messages = [
                'id_program.required'       => 'Program tidak boleh kosong!',
                'nama_kegiatan.required'       => 'Nama Kegiatan tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
            $kegiatan = Kegiatan::firstWhere('id',$id);
           $kegiatan->id_laporan = $id_laporan;
           $kegiatan->id_program = $request->id_program;
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->nama_pptk = $request->nama_pptk;
            $kegiatan->pagu_anggaran = $request->pagu_anggaran;
            $kegiatan->nilai_kontrak = $request->nilai_kontrak;
            $kegiatan->rupiah = $request->rupiah;
            $kegiatan->sisa_dana = $request->sisa_dana;
            $kegiatan->save();

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
        $kegiatan = Kegiatan::firstWhere('id',$id);
        $kegiatan->delete();

        return redirect()->route('laporan.show',$id_laporan)->with('success','Data Berhasil Dihapus');
    }
}
