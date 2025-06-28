<!-- Modal -->
<div class="modal fade " id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.program_studi')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row p-3">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Kode Program Studi</label>
                        <input type="text" class="form-control" name="kode_prodi" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nama Program Studi</label>
                        <input type="text" class="form-control" name="nama_prodi" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Singkatan Program_studi</label>
                        <input type="text" class="form-control" name="singkatan_prodi" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Jenjang</label>
                        <select class="form-control select1" id="create_jenjang" name="jenjang" required>
                            <option value="">-- select --</option>
                            @foreach ($jenjang as $item)
                                <option value="{{$item->id}}">{{ $item->nama_jenjang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Kompetensi</label>
                        <select class="form-control select1" name="kompetensi" required>
                            <option value="">-- select --</option>
                            <option value="N">Tidak</option>
                            <option value="Y">Iya</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="nama_prodi" class="form-label">Kaprodi</label>
                        <select class="form-control select1" name="kaprodi">
                            <option value="1">Kosong</option>
                        </select>
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

