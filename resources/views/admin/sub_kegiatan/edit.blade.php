@extends('template_backend.home')
@section('sub-judul','Edit Sub Kegiatan')
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


<form action="{{ route('sub_kegiatan.update', $sub_kegiatan->id ) }}" method="POST">
@csrf
@method('patch')

<div class="form-group">
    <label>PPTK</label>
 	<select class="form-control" name="id_pptk">
  		<option value="" holder>Pilih PPTK</option>
  		@foreach($pptk as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $sub_kegiatan->id_pptk)
    	selected
    	@endif
    	>{{$result->nama_pptk }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Sub Kegiatan</label>
   	<input type="text" class="form-control" name="subkgt" value="{{ $sub_kegiatan->subkgt }}">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  