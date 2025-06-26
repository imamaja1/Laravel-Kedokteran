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
                        <ul class="nav nav-pills nav-secondary  nav-pills-no-bd nav-pills-icons justify-content-start"
                            id="pills-tab-with-icon" role="tablist">
                            @foreach ($data as $key => $item)
                                <li class="nav-item " role="presentation">
                                    <a class="nav-link  @if ($key == 0) active @endif"
                                        data-bs-toggle="pill" href="#data{{ $key }}" role="tab"
                                        aria-controls="pills-home-icon" aria-selected="true">
                                        {{ $item->nama_kurikulum }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        @foreach ($data as $key => $item)
                            <div class="tab-content " id="pills-with-icon-tabContent">
                                <div class="tab-pane fade show @if ($key == 0) active aktif @endif"
                                    id="data{{ $key }}" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                                    <table class="table table-striped">
                                        @php $semetser = 0 @endphp
                                        @foreach ($item->kurikulum as $item2)
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
                                                        <th scope="col" >SKS Teori</th>
                                                        <th scope="col" >SKS Praktek</th>
                                                        <th scope="col" >SKS Pratikum</th>
                                                    </tr>
                                                </thead>
                                                <tr>
                                                    <td scope="col">@php echo $no=1 @endphp</td>
                                                    <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                                    <td scope="col">{{ $item2->nama_matakuliah }}</td>
                                                    <td scope="col">{{ $item2->sks_teori }}</td>
                                                    <td scope="col">{{ $item2->sks_praktek }}</td>
                                                    <td scope="col">{{ $item2->sks_praktikum }}</td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td scope="col">{{ ++$no }}</td>
                                                    <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                                    <td scope="col">{{ $item2->nama_matakuliah }}</td>
                                                    <td scope="col">{{ $item2->sks_teori }}</td>
                                                    <td scope="col">{{ $item2->sks_praktek }}</td>
                                                    <td scope="col">{{ $item2->sks_praktikum }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
@endsection
