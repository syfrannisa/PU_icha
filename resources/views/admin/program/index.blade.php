@extends('template_backend.home')
@section('sub-judul','Program')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>

	<a href="{{ route('program.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

	<table id="myTable" class="table table-bordered table-hover table-stripped">
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">Kpa</th>
			<th class="text-center">Program</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($program as $result => $hasil)
			<tr>
				<td>{{ $result + 1 }} </td>
				<td>{{ optional($hasil->kpa)->nama_kpa }}</td>
				<td>{{ $hasil->nama_program}}</td>
				<td>
					<form action="{{ route('program.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('program.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection   