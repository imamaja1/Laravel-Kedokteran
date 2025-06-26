@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
                <a href="{{ route('admin.program_studi.jenjang') }}" class="btn btn-sm btn-success">Jenjang</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Program Studi</th>
                            <th>Nama Program Studi</th>
                            <th>Singkatan Program Studi</th>
                            <th>Kaprodi</th>
                            <th>Kompetensi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->kode_program_studi }}</td>
                                <td>{{ $item->nama_program_studi }}</td>
                                <td>{{ $item->singkatan_program_studi }}</td>
                                <td>{{ $item->kaprodi ? $item->kaprodi : '-' }}</td>
                                <td>{{ $item->kompetensi }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="update({{ $item }})"
                                        data-bs-toggle="modal" data-bs-target="#update">Update</button>
                                    <form id="delete-form-{{$item->id}}" action="{{route('admin.program_studi.delete',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{$item->id}})">Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('admin/jurusan/program_studi/create')
    @include('admin/jurusan/program_studi/update')
@endsection
@section('src')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Kamu Yakin ?',
                text: "Data Yang Dihapus Tidak Bisa Dikembaliakn!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'delete',
                cancelButtonText: 'cancel',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
@endsection
