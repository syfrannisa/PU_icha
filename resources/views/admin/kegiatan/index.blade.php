@extends('template_backend.home')
@section('sub-judul','Kegiatan')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>

<div>

	<a href="{{ route('kegiatan.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

	<table id="myTable" class="table table-bordered table-hover table-stripped">
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">Program</th>
			<th class="text-center">Kegiatan</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($kegiatan as $result => $hasil)
			<tr>
				<td>{{ $result + 1 }} </td>
				<td>{{ optional($hasil->program)->nama_program }}</td>
				<td>{{ $hasil->nama_kegiatan}}</td>
				<td>
					<form action="{{ route('kegiatan.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('kegiatan.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>

@endsection   