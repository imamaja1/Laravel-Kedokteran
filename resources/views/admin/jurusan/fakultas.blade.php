@extends('admin.layout')

@section('link')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="page-inner">
        <div class="">
            <div>
                <h2 class="fw-bold mb-3">{{ $title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-stats card-round edit">
                    <div class="card-header">
                    </div>
                    <form action="{{ route('admin.fakultas.put', $data->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Kode Fakultas</label>
                                <input type="" class="form-control" name="kode_fakultas"
                                    value="{{ $data->kode_fakultas }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Nama Fakultas</label>
                                <input type="" class="form-control" name="nama_fakultas"
                                    value="{{ $data->nama_fakultas }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="singkatan" class="form-label">Dekan</label>
                                <select name="dekan" id="edit_dekan" class="form-control select3" required>
                                    <option value="{{ $data->dekan }}">{{ $data->dekan }}</option>
                                    {{-- @foreach ($dosen as $val)
                                        <option value="1">asdasd</option>
                                        <option value="{{ $val->kode_dosen }}">{{ $val->nama_dosen }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="mb-3 float-end">
                                <button type="button" class="btn btn-danger btn_close">Cencel</button>
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
    <script>
        $(".select3").select2({
            width: '100%'
        });
    </script>
@endsection
