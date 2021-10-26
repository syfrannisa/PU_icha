@extends('template_backend.home')
@if($status == 'Tambah')
@section('sub-judul','Tambah Program')
@else
@section('sub-judul','Edit Program')
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


<form action="{{ ($status == 'Tambah') ? route('program.store') : route('program.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@if($status == 'Edit')
@method('patch')
@endif
<input type="hidden" name="id_laporan" value="{{ $id_laporan }}">

<div class="form-group">
   	<label>Nama Program</label>
   	<input type="text" class="form-control" name="nama_program" @if($status == 'Edit') value="{{ $data->nama_program}}" @endif placeholder="Inputkan Nama Program">
</div>
<div class="form-group">
    <label>Nama KPA</label>
    <input type="text" class="form-control" name="nama_kpa" @if($status == 'Edit') value="{{ $data->nama_kpa}}" @endif placeholder="Inputkan Nama KPA">
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