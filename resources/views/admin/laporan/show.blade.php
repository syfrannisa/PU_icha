@extends('template_backend.home')
@section('sub-judul','Detail PBJ')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>
    <table class="mb-4" style="font-weight:bold;font-size:16px">
        <tr>
            <td>
                Judul
            </td>
            <td width="10px" align="center">
                :
            </td>
            <td>
                {{$data->judul_laporan}}
            </td>
        </tr>
        <tr>
            <td>
                Triwulan
            </td>
            <td width="10px" align="center">
                :
            </td>
            <td>
                {{$data->triwulan}}
            </td>
        </tr>
        <tr>
            <td>
                Tahun
            </td>
            <td width="10px" align="center">
                :
            </td>
            <td>
                {{$data->tahun}}
            </td>
        </tr>
        <tr>
            <td>
                NIP Kadis
            </td>
            <td width="10px" align="center">
                :
            </td>
            <td>
                {{$data->nama_kadis}}
            </td>
        </tr>
        <tr>
            <td>
                Nama Kadis &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
            <td width="10px" align="center">
                : 
            </td>
            <td>
                {{$data->nip_kadis}}
            </td>
        </tr>
    </table>
	{{-- <a href="{{ route('laporan.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>  Tambah</a> --}}
    <div class="row pl-3">
        <a href="{{ route('laporan.index') }}" class="btn btn-info mr-2">Kembali</a>
        <a href="{{ route('laporan.edit',$data->id) }}" class="btn btn-warning mr-2">Edit PBJ</a>
        <div class="dropdown dropright">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            Silahkan pilih untuk menambahkan data
            </button>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('program.create') }}?data_id={{ $data->id }}">Tambah Program</a>
            <a class="dropdown-item" href="{{ route('kegiatan.create') }}?data_id={{ $data->id }}">Tambah Kegiatan</a>
            <a class="dropdown-item" href="{{ route('sub_kegiatan.create') }}?data_id={{ $data->id }}">Tambah Sub Kegiatan</a>
            <a class="dropdown-item" href="{{ route('rincian.create') }}?data_id={{ $data->id }}">Tambah Rincian</a>
            <a class="dropdown-item" href="{{ route('sub_rincian.create') }}?data_id={{ $data->id }}">Tambah Sub Rincian</a>
            </div>
        </div>
    </div>
	<br><br>
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-stripped">
            <thead>
                <tr align="center">
                    <th>#</th>
                    <th>KPA/PPK-PPTK</th>
                    <th>Kegiatan/Sub Kegiatan</th>
                    <th>Pagu Anggaran</th>
                    <th>Nilai Kontrak</th>
                    <th>Rupiah</th>
                    <th>Sisa Dana</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($program as $key => $i)
                <tr style="background:#f2f2f2;font-weight:bold">
                    <td>{{ $key + 1 }}</td>
                    <td>
                        {{ $i->nama_kpa }}
                    </td>
                    <td>{{$i->nama_program}}</td>
                    <td>{{$i->pagu_anggaran}}</td>
                    <td>{{$i->nilai_kontrak}}</td>
                    <td>{{$i->rupiah}}</td>
                    <td>{{$i->sisa_dana}}</td>
                    <td align="center">
                        <div class="dropdown dropleft">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                              Pilih
                            </button>
                            <div class="dropdown-menu">
                                <form action="{{ route('program.destroy', $i->id) }}?data_id={{ $data->id }}" method="POST"> 
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('program.edit', $i->id ) }}?data_id={{ $data->id }}" class="dropdown-item" style="font-size: 12px;margin-left:4px">Edit Program</a>
                                    <button type="submit" class="dropdown-item" style="font-size: 12px">Hapus Program</button>
                                </form>
                            </div>
                          </div>
                    </td>
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
                        <td>{{$kegiatan->rupiah}}</td>
                        <td>{{$kegiatan->sisa_dana}}</td>
                        <td align="center">
                            <div class="dropdown dropleft">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                  Pilih
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}?data_id={{ $data->id }}" method="POST"> 
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('kegiatan.edit', $kegiatan->id ) }}?data_id={{ $data->id }}" class="dropdown-item" style="font-size: 12px;margin-left:4px">Edit Kegiatan</a>
                                        <button type="submit" class="dropdown-item" style="font-size: 12px">Hapus Kegiatan</button>
                                    </form>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @foreach ($kegiatan->subkegiatan as $subkegiatan)
                    <tr style="font-weight:bold">
                        <td></td>
                        <td></td>
                        <td>{{ $subkegiatan->nama_sub_kegiatan }}</td>
                        <td>{{$subkegiatan->pagu_anggaran}}</td>
                        <td>{{$subkegiatan->nilai_kontrak}}</td>
                        <td>{{$subkegiatan->rupiah}}</td>
                        <td>{{$subkegiatan->sisa_dana}}</td>
                        <td align="center">
                            <div class="dropdown dropleft">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                  Pilih
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('sub_kegiatan.destroy', $subkegiatan->id) }}?data_id={{ $data->id }}" method="POST"> 
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('sub_kegiatan.edit', $subkegiatan->id ) }}?data_id={{ $data->id }}" class="dropdown-item" style="font-size: 12px;margin-left:4px">Edit Sub Kegiatan</a>
                                        <button type="submit" class="dropdown-item" style="font-size: 12px">Hapus Sub Kegiatan</button>
                                    </form>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @foreach ($subkegiatan->rincian as $key2 => $rincian)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{$key2 + 1}}. {{ $rincian->nama_rincian }}</td>
                        <td>{{$rincian->pagu_anggaran}}</td>
                        <td>{{$rincian->nilai_kontrak}}</td>
                        <td>{{$rincian->rupiah}}</td>
                        <td>{{$rincian->sisa_dana}}</td>
                        <td align="center">
                            <div class="dropdown dropleft">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                  Pilih
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('rincian.destroy', $rincian->id) }}?data_id={{ $data->id }}" method="POST"> 
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('rincian.edit', $rincian->id ) }}?data_id={{ $data->id }}" class="dropdown-item" style="font-size: 12px;margin-left:4px">Edit Rincian</a>
                                        <button type="submit" class="dropdown-item" style="font-size: 12px">Hapus Rincian</button>
                                    </form>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @foreach ($rincian->subrincian as $subrincian)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>- {{ $subrincian->nama_sub_rincian }}</td>
                        <td>{{$subrincian->pagu_anggaran}}</td>
                        <td>{{$subrincian->nilai_kontrak}}</td>
                        <td>{{$subrincian->rupiah}}</td>
                        <td>{{$subrincian->sisa_dana}}</td>
                        <td align="center">
                            <div class="dropdown dropleft">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                                  Pilih
                                </button>
                                <div class="dropdown-menu">
                                    <form action="{{ route('sub_rincian.destroy', $subrincian->id) }}?data_id={{ $data->id }}" method="POST"> 
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('sub_rincian.edit', $subrincian->id ) }}?data_id={{ $data->id }}" class="dropdown-item" style="font-size: 12px;margin-left:4px">Edit Sub Rincian</a>
                                        <button type="submit" class="dropdown-item" style="font-size: 12px">Hapus Sub Rincian</button>
                                    </form>
                                </div>
                              </div>
                        </td>
                    </tr>
                    @endforeach
                    @endforeach    
                    @endforeach
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection   