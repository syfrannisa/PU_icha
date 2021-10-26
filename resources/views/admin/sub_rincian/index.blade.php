@extends('template_backend.home')
@section('sub-judul','Sub Rincian')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>
	<a href="{{ route('sub_rincian.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

		<table id="myTable" class="table table-bordered table-hover table-stripped">
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">Rincian</th>
			<th class="text-center">Sub Rincian</th>
			<th class="col-sm-2">Action</th>
		</thead>
		<tbody>
			@foreach ($sub_rincian as $result => $hasil)
			<tr>
				<td>{{ $result + 1}} </td>
				<td>{{ optional($hasil->rincian)->nama_rincian }}</td>
				<td>{{ $hasil->nama_sub_rincian}}</td>
				<td>
					<form action="{{ route('sub_rincian.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('sub_rincian.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection   