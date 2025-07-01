@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-left">Kode Matakuliah</th>
                            <th class="text-left">Nama Matakuliah</th>
                            <th class="text-center">SKS Teori</th>
                            <th class="text-center">SKS Praktik</th>
                            <th class="text-center">SKS Praktikum</th>
                            <th class="text-center">Total SKS</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $item->kode_matakuliah }}</td>
                                <td>{{ $item->nama_matakuliah }}</td>
                                <td  class="text-center">{{ $item->sks_teori ? $item->sks_teori : '-' }}</td>
                                <td  class="text-center">{{ $item->sks_praktik ? $item->sks_praktik : '-' }}</td>
                                <td  class="text-center">{{ $item->sks_praktikum ? $item->sks_praktikum : '-' }}</td>
                                <td  class="text-center">{{ $item->sks_teori+$item->sks_praktik+$item->sks_praktikum }}</td>
                                <td  class="text-center">
                                    <button class="btn btn-sm btn-primary" onclick="update({{ $item }})"
                                        data-bs-toggle="modal" data-bs-target="#update">Update</button>
                                    <form id="delete-form-{{$item->id}}" action="{{route('admin.matakuliah.delete',$item->id)}}" method="post">
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
    @include('admin/jurusan/matakuliah/create')
    @include('admin/jurusan/matakuliah/update')
@endsection
@section('src')
    <script>
        $('.select1').each(function() {
            $(this).select2({
                width: '100%',
                dropdownParent: $(this).closest('.modal'),
            });
        });

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
