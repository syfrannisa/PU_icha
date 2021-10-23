@extends('template_backend.home')
@section('sub-judul','Edit Program')
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


<form action="{{ route('program.update', $program->id ) }}" method="POST">
@csrf
@method('patch')
<div class="form-group">
    <label>KPA</label>
 	<select class="form-control" name="id_kpa">
  		<option value="" holder>Pilih Kpa</option>
  		@foreach($kpa as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $program->id_kpa)
    	selected
    	@endif
    	>{{$result->nama_kpa }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Program</label>
   	<input type="text" class="form-control" name="nama_program" value="{{ $program->nama_program }}">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  