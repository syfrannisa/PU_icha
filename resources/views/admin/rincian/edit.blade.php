@extends('template_backend.home')
@section('sub-judul','Edit Rincian')
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


<form action="{{ route('rincian.update', $rincian->id ) }}" method="POST">
@csrf
@method('patch')

<div class="form-group">
    <label>Sub Kegiatan</label>
 	<select class="form-control" name="id_sub_kegiatan">
  		<option value="" holder>Pilih Sub Kegiatan</option>
  		@foreach($sub_kegiatan as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $rincian->id_sub_kegiatan)
    	selected
    	@endif
    	>{{$result->subkgt }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Rincian</label>
   	<input type="text" class="form-control" name="nama_rincian" value="{{ $rincian->nama_rincian }}">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  