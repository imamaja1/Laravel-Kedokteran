@extends('admin.layout')

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
                <div class="card card-stats card-round sub-tambah">
                    <div class="card-header">
                        <button class="btn bnt-small btn-primary btn_tambah"> Tambah</button>
                    </div>
                </div>
                <div class="card card-stats card-round tambah visually-hidden"> 
                    <div class="card-header">
                        <h3>
                            Tambah Data
                        </h3>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="kode_istitusi" class="form-label">Kode Jenjang</label>
                                <input type="" class="form-control" name="kode_jenjang" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Nama Jenjang</label>
                                <input type="" class="form-control" name="nama_jenjang" required>
                            </div>
                            <div class="mb-3">
                                <label for="singkatan" class="form-label">Nama Institusi</label>
                                <select name="kode_institusi" class="form-control select2" required>
                                    <option value=""> </option>
                                </select>
                            </div>
                            <div class="mb-3 float-end">
                                <button  type="button" class="btn btn-danger btn_close">Cencel</button>    
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-stats card-round edit visually-hidden"> 
                    <div class="card-header">
                        <h3>
                            Update Data
                        </h3>
                    </div>
                    <form action="" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <input type="hidden" class="form-control" id="edit_id_jenjang" name="id_jenjang" required>
                            <div class="mb-3">
                                <label for="kode_istitusi" class="form-label">Kode Jenjang</label>
                                <input type="" class="form-control" id="edit_kode_jenjang" name="kode_jenjang" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_institusi" class="form-label">Nama Jenjang</label>
                                <input type="" class="form-control" id="edit_nama_jenjang" name="nama_jenjang" required>
                            </div>
                            <div class="mb-3">
                                <label for="singkatan" class="form-label">Nama Institusi</label>
                                <select name="kode_institusi" id="edit_kode_institusi" class="form-control select2" required>
                                    <option value=""> </option>
                                </select>
                            </div>
                            <div class="mb-3 float-end">
                                <button  type="button" class="btn btn-danger btn_close">Cencel</button>    
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>No</th>
                                <th>Kode Matakuliah</th>
                                <th>Nama Matakuliah</th>
                                <th>SKS Teori</th>
                                <th>SKS Praktek</th>
                                <th>SKS Praktikum</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <form action="" method="post" id="delete-form{{ $key + 1 }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit({{ $item }})">Edit </button>
                                        <button type="button" class="btn btn-sm btn-danger"
                                            onclick="confirmDelete({{ $key + 1 }})"> Hapus </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('src')
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>
        $("#basic-datatables").DataTable({});
        $('.btn_tambah').click(function(){
            $('.sub-tambah').addClass("visually-hidden");
            $('.tambah').removeClass("visually-hidden");
        });
        $('.btn_close').click(function(){
            $('.sub-tambah').removeClass("visually-hidden");
            $('.tambah').addClass("visually-hidden");
            $('.edit').addClass("visually-hidden");
        });
        function edit(data) {
            $('#edit_id_jenjang').val(data.id_jenjang)
            $('#edit_kode_institusi').val(data.kode_institusi).select2()
            $("#edit_nama_jenjang").val(data.nama_jenjang)
            $("#edit_kode_jenjang").val(data.kode_jenjang)
            
            $('.sub-tambah').addClass("visually-hidden");
            $('.tambah').addClass("visually-hidden");
            $('.edit').removeClass("visually-hidden");
            
            document.documentElement.scrollTop = 0;
        }
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
                buttonsStyling: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    document.getElementById('delete-form' + id).submit();
                }
            });
        }
        $(".select2").select2({
            theme: "bootstrap-5",
        });
        $(".select3").select2({
            theme: "bootstrap-5",
        });
    </script>
@endsection
