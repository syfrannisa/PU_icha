@extends('template_backend.home')
@section('sub-judul','Edit PPTK')
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


<form action="{{ route('pptk.update', $pptk->id ) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('patch')
<div class="form-group">
    <label>KPA</label>
 	<select class="form-control" name="id_kpa">
  		<option value="" holder>Pilih Kpa</option>
  		@foreach($kpa as $result)
  		<option value="{{ $result->id }}"
    	@if($result->id == $pptk->id_kpa)
    	selected
    	@endif
    	>{{$result->nama_kpa }}</option>
  	@endforeach
	</select>
</div>

<div class="form-group">
   	<label>PPTK</label>
   	<input type="text" class="form-control" name="nama_pptk" value="{{ $pptk->nama_pptk }}">
</div>

<div class="form-group">
    <button class="btn btn-primary btn-block">Update Kegiatan</button>
</div>

</form>

@endsection  