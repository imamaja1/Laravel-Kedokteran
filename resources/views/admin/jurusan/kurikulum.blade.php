@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Recipient’s username"
                        aria-label="Recipient’s username" aria-describedby="button-addon2">
                    <button class="btn input-group-text" type="button" id="button-addon2">Search</button>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#create">Tambah</button>
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
