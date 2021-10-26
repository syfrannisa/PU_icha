@extends('template_backend.home')
@if($status == 'Tambah')
@section('sub-judul','Tambah Sub Rincian')
@else
@section('sub-judul','Edit Sub Rincian')
@endif
@section('content')

	@if(count($errors)>0)
	 @foreach($errors->all() as $error)
		<div class="alert alert-danger" role="alert">
			{{ $error }} 
		</div>
	 @endforeach
	@endif

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif


<form action="{{ ($status == 'Tambah') ? route('sub_rincian.store') : route('sub_rincian.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@if($status == 'Edit')
@method('patch')
@endif
<input type="hidden" name="id_laporan" value="{{ $id_laporan }}">
<div class="form-group">
	<label>Rincian</label>
		<select class="form-control" name="id_rincian">
  		<option value="" holder>Pilih Rincian</option>
  		@foreach($rincian as $result)
  		<option value="{{ $result->id }}" @if($status == 'Edit') @if($data->id_rincian == $result->id) selected  @endif @endif>{{ $result->nama_rincian }}</option>
  		@endforeach
	</select>
</div>
<div class="form-group">
   	<label>Nama Sub Rincian</label>
   	<input type="text" class="form-control" name="nama_sub_rincian" @if($status == 'Edit') value="{{ $data->nama_sub_rincian}}" @endif placeholder="Inputkan Nama Sub Rincian">
</div>
<div class="form-group">
    <label>Pagu Anggaran</label>
    <input type="number" class="form-control" name="pagu_anggaran" @if($status == 'Edit') value="{{ $data->pagu_anggaran}}" @endif placeholder="Inputkan Pagu Anggaran">
</div>

<div class="form-group">
    <label>Nilai Kontrak (Rp.)</label>
    <input type="number" class="form-control" name="nilai_kontrak" @if($status == 'Edit') value="{{ $data->nilai_kontrak}}" @endif placeholder="Inputkan Nilai Kontrak">
</div>

<div class="form-group">
    <label>Pelaksana/Penyedia PBJ</label>
    <input type="text" class="form-control" name="pelaksana" @if($status == 'Edit') value="{{ $data->pelaksana}}" @endif placeholder="Inputkan Pelaksana/Penyedia PBJ">
</div>

<div class="form-group">
    <label>Nomor Kontrak</label>
    <input type="text" class="form-control" name="nomor_kontrak" @if($status == 'Edit') value="{{ $data->nomor_kontrak}}" @endif placeholder="Inputkan Nomor Kontrak">
</div>

<div class="form-group">
    <label>Mulai</label>
    <input type="date" class="form-control" name="mulai" @if($status == 'Edit') value="{{ $data->mulai}}" @endif placeholder="Inputkan Mulai">
</div>

<div class="form-group">
    <label>Selesai</label>
    <input type="date" class="form-control" name="selesai" @if($status == 'Edit') value="{{ $data->selesai}}" @endif placeholder="Inputkan Selesai">
</div>

<div class="form-group">
    <label>Sistem Pengadaan</label>
    <input type="text" class="form-control" name="sistem_pengadaan" @if($status == 'Edit') value="{{ $data->sistem_pengadaan}}" @endif placeholder="Inputkan Sistem Pengadaan">
</div>

<div class="form-group">
    <label>Fisik (%)</label>
    <input type="number" class="form-control" name="fisik" @if($status == 'Edit') value="{{ $data->fisik}}" @endif placeholder="Inputkan Fisik (%)">
</div>

<div class="form-group">
    <label>Rupiah</label>
    <input type="number" class="form-control" name="rupiah" @if($status == 'Edit') value="{{ $data->rupiah}}" @endif placeholder="Inputkan Rupiah">
</div>

<div class="form-group">
    <label>Sisa Dana</label>
    <input type="number" class="form-control" name="sisa_dana" @if($status == 'Edit') value="{{ $data->sisa_dana}}" @endif placeholder="Inputkan Sisa Dana">
</div>

<div class="form-group">
    <label>Catatan Masalah</label>
    <input type="text" class="form-control" name="catatan_masalah" @if($status == 'Edit') value="{{ $data->catatan_masalah}}" @endif placeholder="Inputkan Catatan Masalah">
</div>

 <div class="form-group">
    <a href="{{ route('laporan.show',$id_laporan) }}" class="btn btn-info ">Kembali</a>
    <button class="btn btn-primary ">Simpan</button>
</div>
</form>

@endsection  