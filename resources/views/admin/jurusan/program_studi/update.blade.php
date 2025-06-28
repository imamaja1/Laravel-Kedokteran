<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Singkatan Program_studi</label>
                        <input type="text" class="form-control" name="singkatan_prodi" id="singkatan_prodi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Jenjang</label>
                        <select name="" id="" class="form-control select1" name="jenjang" id="jenjang">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Kompetensi</label>
                        <select name="" id="" class="form-control select1" name="kompetensi" id="komeptensi_prodi">
                            <option value="N">Tidak</option>
                            <option value="Y">Iya</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Kaprodi</label>
                        <select name="" id="" class="form-control select1" name="kaprodi" id="kaprodi">
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function update(obj) {
        $('#nama_prodi').val(obj.nama_program_studi)
        $('#singkatan_prodi').val(obj.singkatan_program_studi)
        $('#komeptensi_prodi').val(obj.kode_fakultas)
        $('#kaprodi').val(obj.kaprodi)
    }
</script>
