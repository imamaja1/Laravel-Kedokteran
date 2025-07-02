@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <a href="{{ route('admin.kurikulum') }}" class="icon-arrow-left-circle fs-2 text-white bg-danger rounded-pill"></a>
                <a href="#" class="btn btn-sm btn-primary float-md-end" data-bs-toggle="modal" data-bs-target="#create"> <i class="icon-plus pe-1"></i> Tambah </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">Nama Kurikulum</th>
                            <th scope="col">Tahun Akademik</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kurikulum as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$item->nama_kurikulum}}</td>
                                <td>{{$item->tahun_akademik->tahun_akademik}}</td>
                                <td>
                                    <form id="delete-form-{{$key}}" action="{{route('admin.kurikulum.kedokteran.delete',$item->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-primary rounded-pill" data-bs-toggle="modal" data-bs-target="#update" onclick="update({{$item}})"><i class="icon-note"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger rounded-pill" onclick="confirmDelete({{$key}})"><i class="icon-trash"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin/jurusan/kurikulum/data_kurikulum/create')
    @include('admin/jurusan/kurikulum/data_kurikulum/update')
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
