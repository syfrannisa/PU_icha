<?php

namespace App\Http\Controllers;

use App\Laporan;
use App\Program;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $laporan = Laporan::orderBy('created_at', 'asc')->get();
        if($request->triwulan != null){
            $program = Program::with(['kegiatan','kegiatan.subkegiatan','kegiatan.subkegiatan.rincian','kegiatan.subkegiatan.rincian.subrincian'])->where('id_laporan',$request->triwulan)->get();
            if(count($program) > 0){
                $status = true;
                $data = $program;
                $report = Laporan::where('id',$request->triwulan)->first();
            }else{
                $status = true;
                $data = null;
                $report = null;
            }
        }else{
            $status = false;
            $data = null;
            $report = null;
        }
        return view('admin.reportlist.index', compact('laporan','data','status','report'));
    }
}
