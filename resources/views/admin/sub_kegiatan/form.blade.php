@extends('template_backend.home')
@if($status == 'Tambah')
@section('sub-judul','Tambah Sub Kegiatan')
@else
@section('sub-judul','Edit Sub Kegiatan')
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


<form action="{{ ($status == 'Tambah') ? route('sub_kegiatan.store') : route('sub_kegiatan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@if($status == 'Edit')
@method('patch')
@endif
<input type="hidden" name="id_laporan" value="{{ $id_laporan }}">
<div class="form-group">
	<label>Kegiatan</label>
		<select class="form-control" name="id_kegiatan">
  		<option value="" holder>Pilih Kegiatan</option>
  		@foreach($kegiatan as $result)
  		<option value="{{ $result->id }}" @if($status == 'Edit') @if($data->id_kegiatan == $result->id) selected  @endif @endif>{{ $result->nama_kegiatan }}</option>
  		@endforeach
	</select>
</div>
<div class="form-group">
   	<label>Nama Sub Kegiatan</label>
   	<input type="text" class="form-control" name="nama_sub_kegiatan" @if($status == 'Edit') value="{{ $data->nama_sub_kegiatan}}" @endif placeholder="Inputkan Nama Sub Kegiatan">
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
    <label>Rupiah</label>
    <input type="number" class="form-control" name="rupiah" @if($status == 'Edit') value="{{ $data->rupiah}}" @endif placeholder="Inputkan Rupiah">
</div>

<div class="form-group">
    <label>Sisa Dana</label>
    <input type="number" class="form-control" name="sisa_dana" @if($status == 'Edit') value="{{ $data->sisa_dana}}" @endif placeholder="Inputkan Sisa Dana">
</div>

 <div class="form-group">
    <a href="{{ route('laporan.show',$id_laporan) }}" class="btn btn-info ">Kembali</a>
    <button class="btn btn-primary ">Simpan</button>
</div>
</form>

@endsection  