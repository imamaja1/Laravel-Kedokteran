@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header row">
                <div class="col-md-4 col-8">
                    <select name="" id="" class="form-control select2" style="width:100%;">
                        <option>2017/2018</option>
                    </select>
                </div>
                <div class="col-md-8 col-4">
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
                </div>
                
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
@section('src')
    <script>
        $('.select1').each(function() {
            $(this).select2({
                width: '100%',
                dropdownParent: $(this).closest('.modal'),
            });
        });
        $('.select2').select2({
            width: 'resolve',
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
