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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                                @foreach ($data as $key => $item)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if ($key == 0) active @endif"
                                            id="pills-home-tab" data-bs-toggle="pill" href="#pills-{{ $item->semester }}"
                                            role="tab" aria-controls="pills-home" aria-selected="true">Semester
                                            {{ $item->semester }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                @foreach ($data as $key => $item)
                                    <div class="tab-pane fade @if ($key == 0) show active @endif "
                                        id="pills-{{ $item->semester }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <div class="col-12 px-4 pb-5">
                                            <div class="float-start"> 
                                                Aktifasi Dosen Wali : <span class="badge bg-primary">Primary</span> |
                                                Aktifasi Dosen Wali : <span class="badge bg-primary">Primary</span>
                                            </div>
                                            <button class="btn btn-primary btn-sm float-end "> Download </button>
                                        </div>
                                        <hr>
                                        <div class="col-12 text-center px-4 pt-3">
                                            <h5>
                                                KARTU RECANA STUDI (KRS) JENJANG S2 ILMU KOMPUTER (S2 ILKOM) 
                                                <br> 
                                                SEMESTER @if ($item->semester % 2 == 1) GANJIL @else GENEAP @endif
                                            </h5>
                                        </div>
                                        <div class="row text-justify">
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td scope="col">Nama Mahasiswa</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->nama_mahasiswa}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">NIM</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->nim}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Semester</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->semester}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Dosen Wali</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">Dading Oktaviadi Resmiranta</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td scope="col">Alamat Sekarang</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->alamat}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">No. Telp/HP</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->telepon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Alamat Orang Tua</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->alamat_orangtua}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Telp</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{$item->telepon_orangtua}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row text-center">
                                            <p>
                                                Tanda √ di kolom <b>B</b> atau <b>U</b> menandakan matakuliah yang dipilih.
                                            </p>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-head-bg-info" >
                                                <thead class="pt-5">
                                                    <tr>
                                                        <th scope="col" rowspan="2">No.</th>
                                                        <th scope="col" rowspan="2">Kode Matakuliah</th>
                                                        <th scope="col" rowspan="2">Nama Matakuliah</th>
                                                        <th scope="col" colspan="3" class="text-center">SKS</th>
                                                        <th scope="col" rowspan="2">B</th>
                                                        <th scope="col" rowspan="2">U</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col">T</th>
                                                        <th scope="col">PK</th>
                                                        <th scope="col">PT</th>
                                                    </tr>
                                                </thead>
                                                </tbody>
                                                @php
                                                    $sks = 0;
                                                @endphp
                                                @foreach ($item->khs as $no => $item2)
                                                    <tr>
                                                        <td scope="col">{{ $no + 1 }}</td>
                                                        <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                                        <td scope="col">{{ $item2->nama_matakuliah }}</td>
                                                        <td scope="col">
                                                            {{ $item2->sks_teori }}
                                                            @php $sks += $item2->sks_teori  @endphp
                                                        </td>
                                                        <td scope="col">
                                                            {{ $item2->sks_praktek }}
                                                            @php $sks += $item2->sks_praktek  @endphp
                                                        </td>
                                                        <td scope="col">
                                                            {{ $item2->sks_praktikum }}
                                                            @php $sks += $item2->sks_praktikum  @endphp
                                                        </td>
                                                        <td scope="col">
                                                            @if ($item2->status == 'B') √ @else - @endif
                                                        </td>
                                                        <td scope="col">
                                                            @if ($item2->status == 'U') √ @else - @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>IP Semester Lalu</td>
                                                        <td>:</td>
                                                        <td>3.93</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Beban SKS Semester Sekarang</td>
                                                        <td>:</td>
                                                        <td>24</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tr>
                                                        <td>Jumlah kredit yang diambil</td>
                                                        <td>:</td>
                                                        <td>{{ $sks }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah kredit yang dibatalkan</td>
                                                        <td>:</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah kredit yang diambil</td>
                                                        <td>:</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah kredit terakhir</td>
                                                        <td>:</td>
                                                        <td>{{ $sks }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Keterangan</h4>
                                        <b>Status Pengambilan Matakuliah</b><br>
                                        <b>B</b>:Baru     <b>U</b>:Ulang <br>
                                        <b>Jenis SKS Matakuliah</b><br>
                                        <b>T</b>:Teori     <b>PK</b>:Praktek     <b>PT</b>:Praktikum
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
@endsection
