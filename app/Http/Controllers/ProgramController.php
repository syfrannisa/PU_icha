<?php

namespace App\Http\Controllers;

use App\Program;
use App\Kpa;
use App\Data_pbj;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::with('kpa')->get();
        return view('admin.program.index', compact('program'));
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
        return view('admin.program.form', compact('status','id_laporan'));
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
                'nama_program' => 'required',
            );

            $messages = [
                'nama_program.required' => 'Program sub bidang tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           // $program = Data::create([
           //  'id_program'       => $request->id_kpa,
           //  'nama_program' => $request->nama_program,
           
           // ]);
           $id_laporan = $request->id_laporan;
           $program = new Program;
           $program->id_laporan = $id_laporan;
           $program->nama_program = $request->nama_program;
           $program->nama_kpa = $request->nama_kpa;
           $program->pagu_anggaran = $request->pagu_anggaran;
           $program->nilai_kontrak = $request->nilai_kontrak;
           $program->rupiah = $request->rupiah;
           $program->sisa_dana = $request->sisa_dana;
           $program->save();

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
        $data = Program::firstWhere('id',$id);
        return view('admin.program.form', compact('status','data','id_laporan'));
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
                'nama_program' => 'required',
            );

            $messages = [
                'nama_program.required'       => 'Nama Program tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $id_laporan = $request->id_laporan;
            $program = Program::firstWhere('id',$id);
            $program->id_laporan = $id_laporan;
            $program->nama_program = $request->nama_program;
            $program->nama_kpa = $request->nama_kpa;
            $program->pagu_anggaran = $request->pagu_anggaran;
            $program->nilai_kontrak = $request->nilai_kontrak;
            $program->rupiah = $request->rupiah;
            $program->sisa_dana = $request->sisa_dana;
            $program->save();

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
        $program = Program::firstWhere('id',$id);
        $program->delete();

        return redirect()->back()->with('success','Posts Berhasil Dihapus');
    }
}
