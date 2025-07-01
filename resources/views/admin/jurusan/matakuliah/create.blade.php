<!-- Modal -->
<div class="modal fade " id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.matakuliah')}}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row p-3">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Kode Matakuliah</label>
                        <input type="text" class="form-control" name="kode_matakuliah" placeholder="kode matakuliah" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Nama Matakuliah</label>
                        <input type="text" class="form-control" name="nama_matakuliah" placeholder="nama matakuliah" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">SKS teori</label>
                        <select class="form-control select1" name="sks_teori" required>
                            <option value="0">None</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor 
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">SKS Praktik</label>
                        <select class="form-control select1" name="sks_praktik" required>
                            <option value="0">None</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor 
                        </select>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="" class="form-label">SKS Praktikum</label>
                        <select class="form-control select1" name="sks_praktikum" required>
                            <option value="0">None</option>
                            @for ($i = 1; $i < 11; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor 
                        </select>
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

