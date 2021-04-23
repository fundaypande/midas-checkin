<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Bank Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('test.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                        <label>Nama Test</label>
                        <input type="text" required name="test_name" class="form-control">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Waktu Test (Menit)</label>
                        <input type="number" required name="test_time" class="form-control" placeholder="60">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Deskripsi Test</label>
                        <textarea name="test_description" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="checkbox" name="free" id="" value="1">
                        <label>Gratis</label>
                    </div>


            <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
