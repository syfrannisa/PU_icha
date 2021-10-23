@extends('template_backend.home')
@section('sub-judul','Tambah Sub Rincian')
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


<form action="{{ route('sub_rincian.store') }}" method="POST" enctype="multipart/form-data">
@csrf
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
   	<input type="text" class="form-control" name="nama_sub_rincian">
</div>

<div class="form-group">
    <label>Pagu Anggaran</label>
    <input type="number" class="form-control" name="pagu_anggaran">
</div>

<div class="form-group">
    <label>Nilai Kontrak (Rp.)</label>
    <input type="number" class="form-control" name="nilai_kontrak">
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
    <input type="number" class="form-control" name="rupiah">
</div>

<div class="form-group">
    <label>Sisa Dana</label>
    <input type="number" class="form-control" name="sisa_dana">
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