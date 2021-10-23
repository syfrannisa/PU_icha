@extends('template_backend.home')
@section('sub-judul','Edit Kegiatan')
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


<form action="{{ route('kegiatan.update', $kegiatan->id ) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')

<div class="form-group">
    <label>Program</label>
 	<select class="form-control" name="id_program">
  		<option value="" holder>Pilih Program</option>
  		@foreach($program as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $kegiatan->id_program)
    	selected
    	@endif
    	>{{$result->nama_program }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Kegiatan</label>
   	<input type="text" class="form-control" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  