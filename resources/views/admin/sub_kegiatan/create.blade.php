@extends('template_backend.home')
@section('sub-judul','Tambah Sub Kegiatan')
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


<form action="{{ route('sub_kegiatan.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="form-group">
	<label>PPTK</label>
		<select class="form-control" name="id_pptk">
  		<option value="" holder>Pilih PPTK</option>
  		@foreach($pptk as $result)
  		<option value="{{ $result->id }}">{{ $result->nama_pptk }}</option>
  		@endforeach
	</select>
</div>

<div class="form-group">
   	<label>Sub Kegiatan</label>
   	<input type="text" class="form-control" name="subkgt">
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Simpan</button>
</div>

</form>

@endsection  