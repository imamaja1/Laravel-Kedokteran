<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <form action="{{route('admin.kurikulum.kedokteran')}}" method="post">
                @csrf
                @method('put')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row p-3">
                    <input type="hidden" class="form-control" id="param" name="id" placeholder="Nama Kurikulum" required>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Kurikulum</label>
                        <input type="text" class="form-control" name="nama_kurikulum" id="nama_kurikulum" placeholder="Nama Kurikulum" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tahun Akdemik</label>
                        <select class="form-control select1" name="tahun_akademik" required>
                            @foreach ($tahun_akademik as $item)
                                <option value="{{$item->tahun_akademik}}">{{$item->tahun_akademik}}</option>
                            @endforeach
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

<script>
    function update(params) {
        $('#param').val(params.id)
        $('#nama_kurikulum').val(params.nama_kurikulum)
        $('select[name="tahun_akademik"]').val(params.id_tahun_akademik).trigger('change');
    }
</script>
