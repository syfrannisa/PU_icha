@extends('template_backend.home')
@section('sub-judul','Tambah Rincian')
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


<form action="{{ route('rincian.store') }}" method="POST" enctype="multipart/form-data">
@csrf
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
   	<input type="text" class="form-control" name="nama_rincian">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan</button>
</div>

</form>

@endsection  