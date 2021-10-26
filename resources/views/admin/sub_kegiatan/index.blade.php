@extends('template_backend.home')
@section('sub-judul','Sub Kegiatan')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>

	<a href="{{ route('sub_kegiatan.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

	<table id="myTable" class="table table-bordered table-hover table-stripped">
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">PPTK</th>
			<th class="text-center">Sub Kegiatan</th>
			<th class="col-sm-2">Action</th>
		</thead>
		<tbody>
			@foreach ($sub_kegiatan as $result => $hasil)
			<tr>
				<td>{{ $result + 1 }} </td>
				<td>{{ optional($hasil->pptk)->nama_pptk }}</td>
				<td>{{ $hasil->subkgt}}</td>
				<td>
					<form action="{{ route('sub_kegiatan.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('sub_kegiatan.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection   