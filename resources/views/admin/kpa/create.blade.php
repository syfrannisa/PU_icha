@extends('template_backend.home')
@section('sub-judul','Tambah Kpa')
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

  <form action="{{ route('kpa.store') }}" method="POST">
  	@csrf
  	
<div class="form-group">
    <label>KPA</label>
    <input type="text" class="form-control" name="nama_kpa">
  </div>

<div class="form-group">
    <label>Pagu Anggaran</label>
    <input type="text" class="form-control" name="pagu_anggaran">
  </div>

<div class="form-group">
    <label>Nilai Kotrak</label>
    <input type="text" class="form-control" name="nilai_kontrak">
  </div>

<div class="form-group">
    <label>Rupiah</label>
    <input type="text" class="form-control" name="rupiah">
  </div>

  <div class="form-group">
  	<button class="btn btn-primary btn-block">Simpan Kpa</button>
  </div>
</form>
 
@endsection
