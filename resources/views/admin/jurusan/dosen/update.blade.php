@extends('admin.layout')

@section('link')
@endsection

@section('content')
    <div class="page-inner">
        @include('admin.componen.title')
        <div class="card card-stats card-round w-100">
            <div class="card-body mx-4 ">
                <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="line-dosen-tab" data-bs-toggle="pill" href="#line-dosen" role="tab"
                            aria-controls="pills-home" aria-selected="true">Data Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="password-tab" data-bs-toggle="pill" href="#password" role="tab"
                            aria-controls="pills-foto" aria-selected="false">Password Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="line-signature-tab" data-bs-toggle="pill" href="#line-signature"
                            role="tab" aria-controls="pills-signature" aria-selected="false">Sigantur Dosen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="line-foto-tab" data-bs-toggle="pill" href="#line-foto" role="tab"
                            aria-controls="pills-foto" aria-selected="false">Foto Dosen</a>
                    </li>
                </ul>
                <div class="tab-content mt-3 mb-3" id="line-tabContent">
                    <div class="tab-pane fade @if ($active == 1) show active @endif" id="line-dosen"
                        role="tabpanel" aria-labelledby="line-dosen-tab">

                        <form action="{{ route('admin.dosen') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">NIK / NIDN</label>
                                    <input class="form-control" name="nik" value="{{ $data->nik }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nama Dosen</label>
                                    <input class="form-control" name="nama_dosen" value="{{ $data->nama_dosen }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Fild Studi</label>
                                    <input class="form-control" name="field_studi" value="field_studi" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Alumni</label>
                                    <input class="form-control" name="alumni" value="{{ $data->alumni }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Nomor Telpon</label>
                                    <input class="form-control" name="no_telp" value="{{ $data->no_telp }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Home Base</label>
                                    <input class="form-control" name="homebase" value="{{ $data->homebase }}" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="" class="form-label">Email</label>
                                    <input class="form-control" name="email" value="{{ $data->email }}" required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="" class="form-label">Status Dosen</label>
                                    <input class="form-control" name="status_dosen" value="{{ $data->status_dosen }}"
                                        required>
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="" class="form-label">Status</label>
                                    <input class="form-control" name="status" value="{{ $data->status }}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-end mr-2">Save</button>
                        </form>
                    </div>
                    <div class="tab-pane fade @if ($active == 2) show active @endif" id="password"
                        role="tabpanel" aria-labelledby="line-signature-tab">
                        <div class="input-group">
                            <input type="text" class="form-control" value="password" disabled>
                            <span class="input-group-text">
                                <button class="btn btn-primary">
                                    Generate
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="tab-pane fade @if ($active == 3) show active @endif" id="line-signature"
                        role="tabpanel" aria-labelledby="line-signature-tab">
                        Sigantur Dosen
                    </div>
                    <div class="tab-pane fade @if ($active == 4) show active @endif" id="line-foto"
                        role="tabpanel" aria-labelledby="line-foto-tab">
                        Foto Dosen
                    </div>
                </div>
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
    </script>
@endsection
