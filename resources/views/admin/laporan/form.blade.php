@extends('template_backend.home')
@if($status == 'Tambah')
@section('sub-judul','Tambah PBJ')
@else
@section('sub-judul','Edit PBJ')
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


<form action="{{ ($status == 'Tambah') ? route('laporan.store') : route('laporan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@if($status == 'Edit')
@method('patch')
@endif
<div class="form-group">
   	<label>Judul Laporan</label>
   	<input type="text" class="form-control" name="judul_laporan" @if($status == 'Edit') value="{{ $data->judul_laporan}}" @endif placeholder="Inputkan Judul Laporan">
</div>
<div class="form-group">
    <label>Triwulan</label>
    <input type="text" class="form-control" name="triwulan" @if($status == 'Edit') value="{{ $data->triwulan}}" @endif placeholder="Inputkan Triwulan">
</div>
<div class="form-group">
    <label>Tahun</label>
    <input type="text" class="form-control" name="tahun" @if($status == 'Edit') value="{{ $data->tahun}}" @endif placeholder="Inputkan Tahun">
</div>
<div class="form-group">
    <label>Nama Kadis</label>
    <input type="text" class="form-control" name="nama_kadis" @if($status == 'Edit') value="{{ $data->nama_kadis}}" @endif placeholder="Inputkan Nama Kadis">
</div>
<div class="form-group">
    <label>NIP Kadis</label>
    <input type="text" class="form-control" name="nip_kadis" @if($status == 'Edit') value="{{ $data->nip_kadis}}" @endif placeholder="Inputkan NIP Kadis">
</div>

 <div class="form-group">
    <a href="{{ route('laporan.index') }}" class="btn btn-info ">Kembali</a>
    <button class="btn btn-primary ">Simpan</button>
</div>
</form>

@endsection  