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
                        @foreach ($kurikulum as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_kurikulum }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-8 col-4">
                    <a href="{{ route('admin.kurikulum.kedokteran') }}" class="btn btn-primary mt-2 btn-sm float-end">Kurikulum Angkatan</a>
                </div>
            </div>
            <div class="card-body">
                @for ($i = 1; $i < 9; $i++)
                    <div class="mb-1">
                        <h2>
                            Semester {{ $i }}
                            <button class="btn btn-sm btn-primary float-end " data-bs-toggle="modal"
                                data-bs-target="#create">Tambah</button>
                            <h2>
                    </div>
                    <table class="table">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">Kode Matakulaih</th>
                                <th scope="col">Nama Matakulaih</th>
                                <th scope="col">SKS Teori</th>
                                <th scope="col">SKS Praktik</th>
                                <th scope="col">Total SKS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>2</td>
                                <td>3</td>
                                <td>2</td>
                                <td>total SKS</td>
                                <td><button class="btn btn-sm btn-danger">Delete</button></td>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-end">Jumlah</th>
                                <th>Mark</th>
                                <th>Otto</th>
                                <th colspan="2">TOTAL SEMUA</th>
                            </tr>
                        </tbody>
                    </table>
                @endfor
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
