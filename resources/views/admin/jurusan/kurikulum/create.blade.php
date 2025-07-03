<!-- Modal -->
<div class="modal fade " id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.kurikulum') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row p-3">
                    <input type="hidden" id="semester" name="semester">
                    <input type="hidden" id="kurikulum" name="kurikulum">
                    <div class="mb-3">
                        <label for="" class="form-label">Matakulaih</label>
                        <select class="form-control select1" name="matakuliah" required>
                            @foreach ($matakuliah as $item)
                                <option value="{{$item->id}}">{{$item->nama_matakuliah}}</option>
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
    function create(param1,param2) {
        $('#kurikulum').val(param1)
        $('#semester').val(param2)
    }
</script>