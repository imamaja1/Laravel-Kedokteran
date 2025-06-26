@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <a href="{{ route('admin.program_studi') }}" class="btn btn-sm btn-danger">Back</a>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jenjang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nama_jenjang }}</td>
                                <td>
                                    <form id="delete-form-{{$item->id}}" action="{{route('admin.program_studi.jenjang.delete',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-primary" onclick="update({{ $item }})" data-bs-toggle="modal" data-bs-target="#update">Update</button>
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

    @include('admin/jurusan/program_studi/jenjang/create')
    @include('admin/jurusan/program_studi/jenjang/update')
@endsection
@section('src')
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
