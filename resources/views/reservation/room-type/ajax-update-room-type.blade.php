<form action="{{ route('room.update', ['id' => $data->id]) }}" method="post">
    @csrf
    <div class="form-group col-md-12">
        <label>Room Type *</label>
    <input type="text" name="room_type" class="form-control" id="" required value="{{ $data->room_type }}">
    </div>

    <div class="form-group col-md-12">
        <label>Room Description</label>
        <textarea name="room_desc" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->room_desc }}</textarea>
    </div>

    <div class="form-group col-md-12">
        <label>Room Rate (Rp) *</label>
        <input type="number" name="room_rate" class="form-control" id="" required value="{{ $data->room_rate }}">
    </div>

    <input type="hidden" name="user_id" class="form-control" id="" value="{{ auth()->user()->id }}">


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
