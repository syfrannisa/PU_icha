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
        $kegiatan = Kegiatan::with('program')->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::all();
        return view('admin.kegiatan.create', compact('program'));
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

           //$kegiatan = Kegiatan::create([
            //'id_program'       => $request->id_program,
            //'nama_kegiatan' => $request->nama_kegiatan,
           //]);

            $kegiatan = new kegiatan;
            $kegiatan->id_program = $request->id_program;
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->save();

            $data_pbj = new Data_pbj;
            $data_pbj->id_kegiatan = $kegiatan->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();            
           

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('kegiatan.index')->with('success','Data Anda Berhasil diSimpan'); 
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
        $program = Program::all();
        $kegiatan = Kegiatan::findOrfail($id);
        return view('admin.kegiatan.edit', compact('kegiatan','program'));
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

            $kegiatan = Kegiatan::findOrfail($id);

            $kegiatan->id_program = $request->id_program ;
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->save();

            return redirect()->route('kegiatan.index')->with('success','Data Anda Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::findorfail($id);
        $kegiatan->delete();

        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
