@extends('admin.layout')

@section('link')
    <style>
        .select2-custom-group {
            display: flex;
            width: 100%;
        }

        .select2-container {
            flex: 1;
        }

        .select2-selection--single {
            height: 38px;
            border: 1px solid #ced4da;
            border-radius: 4px 0 0 4px;
            padding: 5px 10px;
        }

        .btn-search {
            background-color: #007bff;
            border: 1px solid #007bff;
            color: white;
            margin-top: 1px;
            padding: 0 15px;
            height: 38px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .btn-search:hover {
            background-color: #0056b3;
        }
    </style>
@endsection

@section('content')
    <div class="page-inner">
        @include('admin/componen/title')
        <div class="card card-stats card-round w-100">
            <div class="card-header row">
                <div class="col-md-4 col-8">
                    <form action="" method="get">
                        <div class="input-group">
                            <select name="kurikulum" id="" class="form-control select3">
                                @foreach ($kurikulum as $item)
                                    <option value="{{ $item->id }}" @if ($id_kurikulum->id == $item->id )
                                        selected
                                    @endif>{{ $item->nama_kurikulum }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn-search icon-magnifier" id="search-btn"></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-4">
                    <a href="{{ route('admin.kurikulum.kedokteran') }}"
                        class="btn btn-primary mt-2 btn-sm float-end">Kurikulum Angkatan</a>
                </div>
            </div>
        </div>
        @foreach ($data as $key => $item)
            <div class="card card-round w-100">
                <div class="card-body">
                    <div class="mb-1">
                        <h4>
                            Semester {{ $item['semester'] }}
                            @if ($id_kurikulum)
                                <button class="btn btn-sm btn-primary float-end " data-bs-toggle="modal" data-bs-target="#create"
                                    onclick="create({{$id_kurikulum->id}},{{ $item['semester'] }})">Tambah</button>
                            @endif

                            <h2>
                    </div>
                    @php
                        $teori[$key] = 0;
                        $praktik[$key] = 0;
                    @endphp
                    @if (count($item['data']) > 0)
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
                                @foreach ($item['data'] as $number => $item2)
                                    <tr>
                                        <td>{{ $item2->data_matakuliah->kode_matakuliah }}</td>
                                        <td>{{ $item2->data_matakuliah->nama_matakuliah }}</td>
                                        <td>{{ $item2->data_matakuliah->sks_teori }}</td>
                                        <td>{{ $item2->data_matakuliah->sks_praktik }}</td>
                                        <td>{{ $item2->data_matakuliah->sks_teori + $item2->data_matakuliah->sks_praktik }}
                                        </td>
                                        <td>
                                            <form id="delete-form-{{$number}}" action="{{route('admin.kurikulum.delete', $item2->id)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="confirmDelete({{$number}})">Delete</button>
                                            </form>
                                        </td>
                                        @php
                                            $teori[$key] = $teori[$key] + $item2->data_matakuliah->sks_teori;
                                            $praktik[$key] = $praktik[$key] + $item2->data_matakuliah->sks_praktik;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="2" class="text-center">Jumlah</th>
                                    <th>{{ $teori[$key] }}</th>
                                    <th>{{ $praktik[$key] }}</th>
                                    <th colspan="2">{{ $teori[$key] + $praktik[$key] }}</th>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        <span>Data SKS tidak ada</span>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="container">
            <div class="row justify-content-end">
                <div class=" card card-stats card-round col-md-4">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td scope="col">Total SKS Teori</td>
                                    <td scope="col">{{ array_sum($teori) }}</td>
                                </tr>
                                <tr>
                                    <td scope="col">Total SKS Praktik</td>
                                    <td scope="col">{{ array_sum($praktik) }}</td>
                                </tr>
                                <tr class="table-secondary">
                                    <td scope="col">Total SKS</td>
                                    <td scope="col">
                                        {{ array_sum($teori) + array_sum($praktik) }}
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin/jurusan/kurikulum/create')
@endsection
@section('src')
    <script>
        $('.select1').each(function () {
            $(this).select2({
                width: '100%',
                dropdownParent: $(this).closest('.modal'),
            });
        });
         $('.select3').each(function () {
            $(this).select2({
                width: '100%',
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