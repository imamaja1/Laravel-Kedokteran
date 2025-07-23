@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK / NIP</th>
                            <th>Nama Dosen</th>
                            <th>Pengajar</th>
                            <th>Status</th>
                            <th class="text-center">Sigantur </th>
                            <th class="text-center">Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nama_dosen }}</td>
                                <td>{{ $item->status_dosen }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-center">
                                    @if($item->sigantur)
                                        <div class=" btn-sm btn-icon btn-round btn-success">
											<i class="fa fa-check pt-1"></i>
										</div>
                                    @else
                                        <div class="btn-sm btn-icon btn-round btn-info">
											<i class="fa fa-info"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($item->foto)
                                        <div  class=" btn-sm btn-icon btn-round btn-success">
											<i class="fa fa-check pt-1"></i>
										</div>
                                    @else
                                        <div class="btn-sm btn-icon btn-round btn-info">
											<i class="fa fa-info"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <form id="delete-form-{{$item->id}}"
                                        action="{{route('admin.program_studi.delete', $item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('admin.dosen.update',$item->id) }}" class="btn btn-sm btn-primary" >Update</a>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{$item->id}})">Delete </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin/jurusan/dosen/create')
@endsection
@section('src')
    <script>
        $('.select1').each(function () {
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