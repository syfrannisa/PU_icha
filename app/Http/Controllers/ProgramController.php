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
        $program = Program::with('kpa')->paginate(10);
        return view('admin.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kpa = Kpa::all();
        return view('admin.program.create', compact('kpa'));
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
                'nama_program' => 'required',
            );

            $messages = [
                'id_kpa.required'       => 'KPA tidak boleh kosong!',
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
            $program = new Program;
            $program->id_kpa = $request->id_kpa;
            $program->nama_program = $request->nama_program;
            $program->save();

            $data_pbj = new Data_pbj;
            $data_pbj->id_program = $program->id;
            $data_pbj->pagu_anggaran = $request->pagu_anggaran;
            $data_pbj->save();

           // $sub_bidang->bidang()->attach($request->bidang);
  
            return redirect()->route('program.index')->with('success','Postingan anda berhasil disimpan'); 
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
        $program = Program::findOrfail($id);
        return view('admin.program.edit', compact('program','kpa'));
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
                'nama_program' => 'required',
            );

            $messages = [
                'id_kpa.required'       => 'Bidang tidak boleh kosong!',
                'nama_program.required'       => 'Nama sub bidang tidak boleh kosong!',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);
     
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

           $program = Program::findOrfail($id);


            $program->id_kpa = $request->id_kpa ;
            $program->nama_program = $request->nama_program;
            $program->save();

            //$data = Data::firstWhere('id_program',$program->id);
            //$data->pagu_anggaran = $request->pagu_anggaran;
            //$data->save();

            return redirect()->route('program.index')->with('success','Postingan anda berhasil update'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::findorfail($id);
        $program->delete();

        return redirect()->back()->with('success','Posts Berhasil Dihapus');
    }
}
