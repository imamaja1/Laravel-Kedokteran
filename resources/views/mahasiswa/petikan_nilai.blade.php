@extends('mahasiswa.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h2 class="fw-bold mb-3">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-sm btn-primary float-end mx-1">Download</button>
                        <button class="btn btn-sm btn-primary float-end mx-1">View</button>
                        <table class="table table-striped">
                            @php $semetser = 0 @endphp
                            @foreach ($data->kurikulum_khs as $item2)
                                @if ($semetser != $item2->semester)
                                    @php $semetser = $item2->semester @endphp
                                    <thead class="pt-5">
                                        <tr>
                                            <td scope="col" colspan="6"></td>
                                        </tr>
                                        <tr>
                                            <td scope="col" colspan="6"><hr><h3>Semester {{$semetser}}</h3><hr></td>
                                        </tr>
                                        <tr>
                                            <th scope="col" >No.</th>
                                            <th scope="col" >Kode Matakuliah</th>
                                            <th scope="col" >Nama Matakuliah</th>
                                            <th scope="col" class="text-center">Grade</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td scope="col">@php echo $no=1 @endphp</td>
                                        <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                        <td scope="col">
                                            {{ $item2->nama_matakuliah }}
                                        </td>
                                        <td scope="col" class="text-center">
                                            @foreach ($item2->nilai as $item3)
                                                {{$item3->grade}}
                                            @endforeach
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td scope="col">{{ ++$no }}</td>
                                        <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                        <td scope="col">
                                            {{ $item2->nama_matakuliah }}
                                        </td>
                                        <td scope="col" class="text-center">
                                            @foreach ($item2->nilai as $item3)
                                                {{$item3->grade}}
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
@endsection
