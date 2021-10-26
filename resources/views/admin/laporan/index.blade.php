@extends('template_backend.home')
@section('sub-judul','Daftar PBJ')
@section('content')

	@if(Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session('success') }} 
		</div>
	@endif

<div>

	<a href="{{ route('laporan.create') }}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i>  Tambah</a>
	<br><br>
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-hover table-stripped">
            <thead>
                <th class="text-center">No</th>
                <th class="text-center">Triwulan</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">Nama Kadis</th>
                <th class="text-center">NIP Kadis</th>
                <th class="text-center">Action</th>
            </thead>
            <tbody>
                @foreach ($data as $result => $i)
                <tr>
                    <td>{{ $result + 1 }} </td>
                    <td>Triwulan {{ $i->triwulan }}</td>
                    <td>{{ $i->tahun}}</td>
                    <td>{{ $i->nama_kadis}}</td>
                    <td>{{ $i->nip_kadis}}</td>
                
                    <td align="center">
                        <form action="{{ route('laporan.destroy', $i->id) }}" method="POST"> 
                            @csrf
                            @method('delete')
                            <a href="{{ route('laporan.show', $i->id ) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('laporan.edit', $i->id ) }}" class="btn btn-warning btn-sm">Edit</a>
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