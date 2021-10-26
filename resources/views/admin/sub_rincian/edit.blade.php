@extends('template_backend.home')
@section('sub-judul','Edit Sub Rincian')
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


<form action="{{ route('sub_rincian.update', $sub_rincian->id ) }}" method="POST">
@csrf
@method('patch')

<div class="form-group">
    <label>Rincian</label>
 	<select class="form-control" name="id_rincian">
  		<option value="" holder>Pilih Rincian</option>
  		@foreach($rincian as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $sub_rincian->id_rincian)
    	selected
    	@endif
    	>{{$result->nama_rincian }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Sub Rincian</label>
   	<input type="text" class="form-control" name="nama_sub_rincian" value="{{ $sub_rincian->nama_sub_rincian }}">
</div>

  <div class="form-group">
    <label>Pagu Anggaran</label>
    <input type="text" class="form-control" name="pagu_anggaran" value="{{ $sub_rincian->data_pbj->pagu_anggaran }}">
</div>

<div class="form-group">
    <label>Nilai Kontrak (Rp.)</label>
    <input type="text" class="form-control" name="nilai_kontrak" value="{{ $sub_rincian->data_pbj->nilai_kontrak }}">
</div>

<div class="form-group">
    <label>Pelaksana/Penyedia PBJ</label>
    <input type="text" class="form-control" name="pelaksana" value="{{ $sub_rincian->data_pbj->pelaksana }}">
</div>

<div class="form-group">
    <label>Nomor Kontrak</label>
    <input type="text" class="form-control" name="nomor_kontrak" value="{{ $sub_rincian->data_pbj->nomor_kontrak }}">
</div>

<div class="form-group">
    <label>Mulai</label>
    <input type="date" class="form-control" name="mulai" value="{{ $sub_rincian->data_pbj->mulai }}">
</div>

<div class="form-group">
    <label>Selesai</label>
    <input type="date" class="form-control" name="selesai" value="{{ $sub_rincian->data_pbj->selesai }}">
</div>

<div class="form-group">
    <label>Sistem Pengadaan</label>
    <input type="text" class="form-control" name="sistem_pengadaan" value="{{ $sub_rincian->data_pbj->sistem_pengadaan }}">
</div>

<div class="form-group">
    <label>Fisik (%)</label>
    <input type="number" class="form-control" name="fisik" value="{{ $sub_rincian->data_pbj->fisik }}">
</div>

<div class="form-group">
    <label>Rupiah</label>
    <input type="text" class="form-control" name="rupiah" value="{{ $sub_rincian->data_pbj->rupiah }}">
</div>

<div class="form-group">
    <label>Sisa Dana</label>
    <input type="text" class="form-control" name="sisa_dana" value="{{ $sub_rincian->data_pbj->sisa_dana }}">
</div>

<div class="form-group">
    <label>Catatan Masalah</label>
    <input type="text" class="form-control" name="catatan_masalah" value="{{ $sub_rincian->data_pbj->catatan_masalah }}">
</div>



<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  