@extends('template_backend.home')
@section('sub-judul','PPTK')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif


	<a href="{{ route('pptk.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

		<table border="1" bgcolor="white" style="width:600px" >
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">KPA</th>
			<th class="text-center">PPTK</th>
			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($pptk as $result => $hasil)
			<tr>
				<td>{{ $result + $pptk->firstitem() }} </td>
				<td>{{ optional($hasil->kpa)->nama_kpa }}</td>
				<td>{{ $hasil->nama_pptk}}</td>
			
				<td>
					<form action="{{ route('pptk.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('pptk.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $pptk->links() }}

@endsection   