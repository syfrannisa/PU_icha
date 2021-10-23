@extends('template_backend.home')
@section('sub-judul','Edit KPA')
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


<form action="{{ route('kpa.update', $kpa->id) }}" method="POST">
@csrf
@method('patch')
<div class="form-group">
    <label>Nama KPA</label>
    <input type="text" class="form-control" name="nama_kpa" value="{{ $kpa->nama_kpa }}" >
</div>

 <div class="form-group">
    <button class="btn btn-primary btn-block">Update KPA</button>
</div>

</form>

@endsection  