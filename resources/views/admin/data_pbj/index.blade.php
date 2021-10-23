@extends('template_backend.home')
@section('sub-judul','Sub Kegiatan')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif


	<a href="{{ route('data_pbj.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>Tambah</a>
	<br><br>

		<table border="1" bgcolor="white" style="width:95%" >
		<thead>
			<th class="text-center">No</th>
			<th class="text-center">KPA</th>
			<th class="text-center">Program</th>
			<th class="text-center">Kegiatan</th>
			<th class="text-center">PPTK</th>
			<th class="text-center">Sub Kegiatan</th>
			<th class="text-center">Rincian</th>
			<th class="text-center">Sub Rincian</th>

			<th class="text-center">Action</th>
		</thead>
		<tbody>
			@foreach ($data_pbj as $result => $hasil)
			<tr>
				<td>{{ $result + $data_pbj->firstitem() }} </td>
				<td>{{ optional($hasil->kpa)->nama_kpa }}</td>
				<td>{{ optional($hasil->program)->nama_program }}</td>
				<td>{{ optional($hasil->kegiatan)->nama_kegiatan }}</td>
				<td>{{ optional($hasil->pptk)->nama_pptk }}</td>
				<td>{{ optional($hasil->sub_kegiatan)->subkgt }}</td>
				<td>{{ optional($hasil->rincian)->nama_rincian }}</td>
				<td>{{ optional($hasil->sub_rincian)->nama_rincian }}</td>

				<td><center>{{ $hasil->pagu_anggaran }}</td>
				<td><center>{{ $hasil->nilai_kontrak }}</td>
				<td><center>{{ $hasil->pelaksana }}</td>
				<td><center>{{ $hasil->nomor_kontrak }}</td>
				<td><center>{{ $hasil->mulai }}</td>
				<td><center>{{ $hasil->selesai }}</td>
				<td><center>{{ $hasil->sistem_pengadaan }}</td>
				<td><center>{{ $hasil->fisik }}</td>
				<td><center>{{ $hasil->rupiah }}</td>
				<td><center>{{ $hasil->sisa_dana }}</td>
				<td><center>{{ $hasil->catatan_masalah }}</td>
				<td>
					<form action="{{ route('data_pbj.destroy', $hasil->id) }}" method="POST"> 
						@csrf
						@method('delete')
						<a href="{{ route('data_pbj.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

@endsection   