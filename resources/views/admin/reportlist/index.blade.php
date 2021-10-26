@extends('template_backend.home')
@section('sub-judul','Laporan')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>
<?php 
// M=1000
// D=500
// C=100
// L=50
// X=10
// V=5
// I=1

function KonDecRomawi($angka)
{
    $hsl = "";
    if ($angka < 1 || $angka > 5000) { 
        // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
        $hsl = "Batas Angka 1 s/d 5000";
    } else {
        while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M"; 
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
        }
    }


    if ($angka >= 500) {
        // statement di atas akan bernilai true / benar
        // Jika var angka lebih dari sama dengan 500
        if ($angka > 500) {
            if ($angka >= 900) {
                $hsl .= "CM";
                $angka -= 900;
            } else {
                $hsl .= "D";
                $angka-=500;
            }
        }
    }
    while ($angka>=100) {
        if ($angka>=400) {
            $hsl .= "CD";
            $angka -= 400;
        } else {
            $angka -= 100;
        }
    }
    if ($angka>=50) {
        if ($angka>=90) {
            $hsl .= "XC";
            $angka -= 90;
        } else {
            $hsl .= "L";
            $angka-=50;
        }
    }
    while ($angka >= 10) {
        if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
        } else {
            $hsl .= "X";
            $angka -= 10;
        }
    }
    if ($angka >= 5) {
        if ($angka == 9) {
            $hsl .= "IX";
            $angka-=9;
        } else {
            $hsl .= "V";
            $angka -= 5;
        }
    }
    while ($angka >= 1) {
        if ($angka == 4) {
            $hsl .= "IV"; 
            $angka -= 4;
        } else {
            $hsl .= "I";
            $angka -= 1;
        }
    }

    return ($hsl);
}
?>
    <form action="{{ route('report.index') }}" method="GET">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <label for="">Pilih Triwulan</label>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="triwulan">
                        <option value="0">-- Pilih --</option>
                        @foreach ($laporan as $i)
                            <option value="{{ $i->id }}" @if(Request::get('triwulan') == $i->id) selected @endif >{{ $i->judul_laporan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-lg">Cari</button>
                </div>
            </div>
        </div>
        <div class="form-group"></div>
    </form>
        <br><br>

@if($status)
    @if($data != null)
    <div class="table-responsive">
        <table style="font-size: 12px" border="1" bgcolor="white">
            <thead>
                <tr align="center">
                    <th rowspan="2" style="vertical-align: middle;">No</th>
                    <th rowspan="2" style="vertical-align: middle;">KPA/PPK-PPTK</th>
                    <th rowspan="2" style="vertical-align: middle;">Kegiatan/Sub Kegiatan</th>
                    <th rowspan="2" style="vertical-align: middle;">Pagu Anggaran</th>
                    <th colspan="3">Kontrak</th>
                    <th colspan="2">Tanggal Kontrak</th>
                    <th rowspan="2" style="vertical-align: middle;">Sistem Pengadaan</th>
                    <th colspan="2">Realisasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Sisa Dana</th>
                    <th rowspan="2" style="vertical-align: middle;">Catatan Masalah</th>
                </tr>
                <tr align="center">
                    <th>Nilai Kontrak (Rp.)</th>
                    <th>Pelaksana/Penyedia PBJ</th>
                    <th>Nomor Kontrak</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Fisik (%)</th>
                    <th>Rupiah</th>
                </tr>
                <tr align="center" style="font-size: 12px">
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>13</th>
                    <th>14</th>
                    <th width="70px">15 = 5 - 4</th>
                    <th>16</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $i)
                <tr style="background:#f2f2f2;font-weight:bold">
                    <td align="center">{{ KonDecRomawi($key + 1) }}</td>
                    <td>
                        {{ $i->nama_kpa }}
                    </td>
                    <td>{{$i->nama_program}}</td>
                    <td>{{$i->pagu_anggaran}}</td>
                    <td>{{$i->nilai_kontrak}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{$i->rupiah}}</td>
                    <td>{{$i->sisa_dana}}</td>
                    <td></td>
                </tr>
                    @foreach($i->kegiatan as $kegiatan)
                    <tr style="background:#f2f2f2;font-weight:bold">
                        <td></td>
                        <td>
                            {{ $kegiatan->nama_pptk }}
                        </td>
                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                        <td>{{$kegiatan->pagu_anggaran}}</td>
                        <td>{{$kegiatan->nilai_kontrak}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$kegiatan->rupiah}}</td>
                        <td>{{$kegiatan->sisa_dana}}</td>
                        <td></td>
                    </tr>
                    @foreach ($kegiatan->subkegiatan as $subkegiatan)
                    <tr style="font-weight:bold">
                        <td></td>
                        <td></td>
                        <td>{{ $subkegiatan->nama_sub_kegiatan }}</td>
                        <td>{{$subkegiatan->pagu_anggaran}}</td>
                        <td>{{$subkegiatan->nilai_kontrak}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$subkegiatan->rupiah}}</td>
                        <td>{{$subkegiatan->sisa_dana}}</td>
                        <td></td>
                    </tr>
                    @foreach ($subkegiatan->rincian as $key2 => $rincian)
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="padding-left:20px">{{$key2 + 1}}. {{ $rincian->nama_rincian }}</td>
                        <td>{{$rincian->pagu_anggaran}}</td>
                        <td>{{$rincian->nilai_kontrak}}</td>
                        <td>{{$rincian->pelaksana}}</td>
                        <td>{{$rincian->nomor_kontrak}}</td>
                        <td>{{$rincian->mulai}}</td>
                        <td>{{$rincian->selesai}}</td>
                        <td>{{$rincian->sistem_pengadaan}}</td>
                        <td>{{$rincian->fisik}}</td>
                        <td>{{$rincian->rupiah}}</td>
                        <td>{{$rincian->sisa_dana}}</td>
                        <td>{{$rincian->catatan_masalah}}</td>
                    </tr>
                    @foreach ($rincian->subrincian as $subrincian)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>- {{ $subrincian->nama_sub_rincian }}</td>
                        <td>{{$subrincian->pagu_anggaran}}</td>
                        <td>{{$subrincian->nilai_kontrak}}</td>
                        <td>{{$subrincian->pelaksana}}</td>
                        <td>{{$subrincian->nomor_kontrak}}</td>
                        <td>{{$subrincian->mulai}}</td>
                        <td>{{$subrincian->selesai}}</td>
                        <td>{{$subrincian->sistem_pengadaan}}</td>
                        <td>{{$subrincian->fisik}}</td>
                        <td>{{$subrincian->rupiah}}</td>
                        <td>{{$subrincian->sisa_dana}}</td>
                        <td>{{$subrincian->catatan_masalah}}</td>
                    </tr>
                    @endforeach
                    @endforeach    
                    @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h4 class="text-center">Belum Ada Program.</h4>
    @endif
@else
@endif



</div>

@endsection   