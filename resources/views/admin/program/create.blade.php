@extends('template_backend.home')
@section('sub-judul','Tambah Program')
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


<form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label>KPA</label>
		<select class="form-control" name="id_kpa">
  		<option value="" holder>Pilih KPA</option>
  		@foreach($kpa as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_kpa }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Program</label>
   	<input type="text" class="form-control" name="nama_program">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan</button>
</div>

</form>

@endsection  