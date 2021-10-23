@extends('template_backend.home')
@section('sub-judul','Tambah Kegiatan')
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


<form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label>Program</label>
		<select class="form-control" name="id_program">
  		<option value="" holder>Pilih Program</option>
  		@foreach($program as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_program }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Kegiatan</label>
   	<input type="text" class="form-control" name="nama_kegiatan">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan</button>
</div>

</form>

@endsection  