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
                                    onclick="create({{$id_kurikulum->id_tahun_akademik}},{{ $item['semester'] }})">Tambah</button>
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