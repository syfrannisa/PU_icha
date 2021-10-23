@extends('template_backend.home')
@section('sub-judul','Tambah Data PBJ')
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


<form action="{{ route('data_pbj.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label>KPA</label>
		<select class="form-control" name="id_kpa">
  		<option value="" holder>Pilih KPA</option>
  		@foreach($kpa as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_kpa }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>Program</label>
		<select class="form-control" name="id_program">
  		<option value="" holder>Pilih KPA</option>
  		@foreach($program as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_program }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>Kegiatan</label>
		<select class="form-control" name="id_kegiatan">
  		<option value="" holder>Pilih Kegiatan</option>
  		@foreach($kegiatan as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_kegiatan }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>PPTK</label>
		<select class="form-control" name="id_pptk">
  		<option value="" holder>Pilih PPTK</option>
  		@foreach($pptk as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_pptk }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>Sub Kegiatan</label>
		<select class="form-control" name="id_sub_kegiatan">
  		<option value="" holder>Pilih Sub Kegiatan</option>
  		@foreach($sub_kegiatan as $result)
  		<option value="{{ $result->id }}">{{ $result->subkgt }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>Rincian</label>
		<select class="form-control" name="id_rincian">
  		<option value="" holder>Pilih Rincian</option>
  		@foreach($rincian as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_rincian }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
	<label>Sub Rincian</label>
		<select class="form-control" name="id_sub_rincian">
  		<option value="" holder>Pilih Sub Rincian</option>
  		@foreach($sub_rincian as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_sub_rincian }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
    <label>Pagu Anggaran</label>
    <input type="text" class="form-control" name="pagu_anggaran">
</div>

<div class="form-group">
    <label>Nilai Kontrak (Rp.)</label>
    <input type="text" class="form-control" name="nilai_kontrak">
</div>

<div class="form-group">
    <label>Pelaksana/Penyedia PBJ</label>
    <input type="text" class="form-control" name="pelaksana">
</div>

<div class="form-group">
    <label>Nomor Kontrak</label>
    <input type="text" class="form-control" name="nomor_kontrak">
</div>

<div class="form-group">
    <label>Mulai</label>
    <input type="date" class="form-control" name="mulai">
</div>

<div class="form-group">
    <label>Selesai</label>
    <input type="date" class="form-control" name="selesai">
</div>

<div class="form-group">
    <label>Sistem Pengadaan</label>
    <input type="text" class="form-control" name="sistem_pengadaan">
</div>

<div class="form-group">
    <label>Fisik (%)</label>
    <input type="number" class="form-control" name="fisik">
</div>

<div class="form-group">
    <label>Rupiah</label>
    <input type="text" class="form-control" name="rupiah">
</div>

<div class="form-group">
    <label>Sisa Dana</label>
    <input type="text" class="form-control" name="sisa_dana">
</div>

<div class="form-group">
    <label>Catatan Masalah</label>
    <input type="text" class="form-control" name="catatan_masalah">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan</button>
</div>

</form>

@endsection  