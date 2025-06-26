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
                <div class="card card-stats card-round">
                    <div class="card-body ">
                        <div class="float-end">
                            Dosen Wali : <span class="badge rounded-pill bg-dark px-3">Muhammad Imam Syarwani</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="alert alert-primary" role="alert" style="box-shadow: 1px 1px 5px 0 rgba(139, 139, 139, 0.26); !importen">
                    <h4 class="alert-heading">Perhatian!</h4>
                    <hr>
                    <p>IDENTITAS MAHASISWA Perhatian ! form pengisian yang mengandung tanda bintang (*) harus
                        diisi.</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-stats card-round">
                    <div class="card-header">
                        Detail Data Mahasiswa
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nomor Induk Mahasiswa * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nomor Pokok Mahasiswa * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nomor Induk Kependudukan(NIK) * :
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nomor Pendaftaran * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Mahasiswa * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Tempat Lahir * :
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Tanggal Lahir * :
                            </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Alamat Lengkap * :</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="nim"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Kota * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Propinsi * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">No. Telepon * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Jenis Kelamin * :</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perempuan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Laki - Laki
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Agama * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Kewarganegaraan * :</label>
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        WNI (Warga Negara Indonesia)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        WNA (Warga Negara Asing)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Instansi/Tempat Kerja :
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Email Kampus :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <button class="btn btn-success float-end"> Update </button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-stats card-round">
                    <div class="card-header">
                        Detail Data Orang Tua
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Ayah * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Agama Ayah *</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Pekerjaan Ayah * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nama Ibu * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Agama Ibu * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Pekerjaan Ibu * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Alamat Orang Tua * :</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" id="nim"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Kota * :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Propinsi * :</label>
                            <div class="col-sm-8">
                                <select name="" id="" class="form-control">
                                    <option value=""> -- pilih --</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-4 col-form-label">Nomor Telepon Orang Tua :</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nim">
                            </div>
                        </div>
                        <button class="btn btn-success float-end"> Update </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
@endsection
