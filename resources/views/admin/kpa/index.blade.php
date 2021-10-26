@extends('template_backend.home')
@section('sub-judul','Nama KPA')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>

	<a href="{{ route('kpa.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

	<table id="myTable" class="table table-bordered table-hover table-stripped">
		<thead>
			<th>No</th>
			<th class="text-center">Nama KPA</th>
			<th class="text-center">Action</th>
		</thead>

		<tbody>
			@foreach ($kpa as $result => $hasil)
			<tr>
				<td>{{ $result + 1 }} </td>
				<td>{{ $hasil->nama_kpa}}</td>
				<td>
					<form action="{{ route('kpa.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('kpa.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection   