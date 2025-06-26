<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route('admin.program_studi.jenjang')}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" name="id" id="id" required hidden>
                    <div class="mb-3">
                        <label for="nama_prodi" class="form-label">Nama Jenjang</label>
                        <input type="text" class="form-control" name="nama_jenjang" id="nama_jenjang" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function update(obj) {
        $('#nama_jenjang').val(obj.nama_jenjang);
        $('#id').val(obj.id);
    }
</script>