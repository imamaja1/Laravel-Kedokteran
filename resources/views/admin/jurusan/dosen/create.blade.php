<!-- Modal -->
<div class="modal fade " id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.dosen') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row p-3">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">NIK / NIDN</label>
                        <input class="form-control" name="nik" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nama Dosen</label>
                        <input class="form-control" name="nama_dosen" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Fild Studi</label>
                        <input class="form-control" name="field_studi" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Alumni</label>
                        <input class="form-control" name="alumni" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nomor Telpon</label>
                        <input class="form-control" name="no_telp" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Home Base</label>
                        <input class="form-control" name="homebase" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input class="form-control" name="email" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Password</label>
                        <input class="form-control" name="sandi_pengguna" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Status Dosen</label>
                        <input class="form-control" name="status_dosen" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Status</label>
                        <input class="form-control" name="status" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>