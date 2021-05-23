<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Tambah Room Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('room.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                        <label>Room Type *</label>
                        <input type="text" name="room_type" class="form-control" id="" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Room Description</label>
                        <textarea name="room_desc" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Room Rate (Rp) *</label>
                        <input type="number" name="room_rate" class="form-control" id="" required>
                    </div>

                    <input type="hidden" name="user_id" class="form-control" id="" value="{{ auth()->user()->id }}">


            <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
