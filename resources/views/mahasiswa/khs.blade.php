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
                                        <div class="col-12 text-center pl-4">
                                            <button class="btn btn-primary btn-sm float-end "> Download </button><br>
                                            <h5>
                                                KARTU RECANA STUDI (KRS) JENJANG S2 ILMU KOMPUTER (S2 ILKOM)
                                                <br>
                                                SEMESTER @if ($item->semester % 2 == 1)
                                                    GANJIL
                                                @else
                                                    GENEAP
                                                @endif
                                            </h5>

                                        </div>
                                        <div class="row text-justify">
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td scope="col">Nama Mahasiswa</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{ $item->nama_mahasiswa }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">NIM</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{ $item->nim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Semester</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">{{ $item->semester }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <table class="table">
                                                    <tr>
                                                        <td scope="col">Program Studi</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Fakultas</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">-</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="col">Kurikulum</td>
                                                        <td scope="col">:</td>
                                                        <td scope="col">-</td>
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
                                            <table class="table table-striped table-head-bg-info">
                                                <thead class="pt-5">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Kode Matakuliah</th>
                                                        <th scope="col">Nama Matakuliah</th>
                                                        <th scope="col" class="text-center">SKS</th>
                                                        <th scope="col">Grade</th>
                                                        <th scope="col">SKSN</th>
                                                        <th scope="col">Ket</th>
                                                    </tr>
                                                </thead>
                                                </tbody>
                                                @php
                                                    $sks = 0;
                                                    $grate = 0;
                                                    $skstotal = 0;
                                                    $sksntotal = 0;
                                                @endphp
                                                @foreach ($item->khs as $no => $item2)
                                                    <tr>
                                                        <td scope="col">{{ $no + 1 }}</td>
                                                        <td scope="col">{{ $item2->kode_matakuliah }}</td>
                                                        <td scope="col">{{ $item2->nama_matakuliah }}</td>
                                                        <td scope="col" class="text-center">
                                                            {{ $sks = $item2->sks_teori + $item2->sks_praktek + $item2->sks_praktikum }}
                                                            @php
                                                                $skstotal +=
                                                                    $item2->sks_teori +
                                                                    $item2->sks_praktek +
                                                                    $item2->sks_praktikum;
                                                            @endphp
                                                        </td>
                                                        <td scope="col" class="text-center">
                                                            {{$item2->nilai_akhir}}
                                                            @if ($item2->nilai_akhir)
                                                                @foreach ($setup as $great)
                                                                    @if ($great->nilai_minimum <= $item2->nilai_akhir && $item2->nilai_akhir <= $great->nilai_maksimum)
                                                                        @php
                                                                            $grate = $great->bobot_nilai;
                                                                        @endphp
                                                                        @break
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                        <td scope="col" class="text-center">
                                                            @if ($sks * $grate <= 0)
                                                                -
                                                            @else
                                                                {{ substr($sks * $grate, 0, 4) }}
                                                            @endif
                                                            @php
                                                                $sksntotal += $sks * $grate;
                                                            @endphp
                                                        </td>
                                                        <td scope="col" class="text-center">
                                                            -
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <tr>
                                                    <td><b>Jumlah SKS yang ditempuh</b></td>
                                                    <td>:</td>
                                                    <td>{{ $skstotal }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>IP Semester ini</b></td>
                                                    <td>:</td>
                                                    <td>
                                                        @if ($sksntotal / $skstotal <= 0)
                                                            -
                                                        @else
                                                            {{ substr($sksntotal / $skstotal, 0, 4) }}
                                                        @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Maksismum SKS Semester Depan</td>
                                                    <td>:</td>
                                                    <td>-</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table style="margin: 150px 0 0 110px">
                                                <tr>
                                                    <td>Mataram, 29 Nov 2024</td>
                                                </tr>
                                                <tr>
                                                    <td>Wakil Rektor I,</td>
                                                </tr>
                                                <tr>
                                                    <td style="height: 70px"></td>
                                                </tr>
                                                <tr>
                                                    <td>Dr.Khasnur Hidjah, S.Kom., M.Cs.</td>
                                                </tr>
                                                <tr>
                                                    <td>NIP : </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
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
