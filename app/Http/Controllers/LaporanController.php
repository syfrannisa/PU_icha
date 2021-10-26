<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Program;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laporan::orderBy('id', 'asc')->get();
        return view('admin.laporan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = 'Tambah';
        return view('admin.laporan.form',compact('status'));
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
            'judul_laporan' => 'required',
            'tahun' => 'required',
            'triwulan' => 'required',
            'nama_kadis' => 'required',
            'nip_kadis' => 'required',
        );

        $messages = [
            'judul_laporan.required' => 'Judul Laporan tidak boleh kosong!',
            'tahun.required' => 'Tahun tidak boleh kosong!',
            'triwulan.required' => 'Triwulan tidak boleh kosong!',
            'nama_kadis.required' => 'Nama Kadis tidak boleh kosong!',
            'nip_kadis.required' => 'Nip Kadis tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = new Laporan;
        $data->judul_laporan = $request->judul_laporan;
        $data->tahun = $request->tahun;
        $data->triwulan = $request->triwulan;
        $data->nama_kadis = $request->nama_kadis;
        $data->nip_kadis = $request->nip_kadis;
        $data->save();

        return redirect()->route('laporan.index')->with('success','Data berhasil disimpan'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Laporan::firstWhere('id',$id);
        $program = Program::with(['kegiatan','kegiatan.subkegiatan','kegiatan.subkegiatan.rincian','kegiatan.subkegiatan.rincian.subrincian'])->where('id_laporan',$id)->get();
        // dd($data);
        return view('admin.laporan.show',compact('data','program'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = 'Edit';
        $data = Laporan::findOrfail($id);
        return view('admin.laporan.form',compact('status','data'));
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
            'judul_laporan' => 'required',
            'tahun' => 'required',
            'triwulan' => 'required',
            'nama_kadis' => 'required',
            'nip_kadis' => 'required',
        );

        $messages = [
            'judul_laporan.required' => 'Judul Laporan tidak boleh kosong!',
            'tahun.required' => 'Tahun tidak boleh kosong!',
            'triwulan.required' => 'Triwulan tidak boleh kosong!',
            'nama_kadis.required' => 'Nama Kadis tidak boleh kosong!',
            'nip_kadis.required' => 'Nip Kadis tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = Laporan::findOrfail($id);
        $data->judul_laporan = $request->judul_laporan;
        $data->tahun = $request->tahun;
        $data->triwulan = $request->triwulan;
        $data->nama_kadis = $request->nama_kadis;
        $data->nip_kadis = $request->nip_kadis;
        $data->save();
        return redirect()->route('laporan.index')->with('success','Data berhasil disimpan'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Laporan::findOrfail($id);
        $data->delete();
        return redirect()->route('laporan.index')->with('success','Data berhasil dihapus'); 
    }
}
