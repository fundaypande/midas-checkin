<form action="{{ route('test.update', ['id' => $data->id]) }}" method="post">
    @csrf
    <div class="form-group col-md-12">
        <label>Nama Test</label>
        <input type="text" required name="test_name" class="form-control" value="{{ $data->test_name }}">
    </div>

    <div class="form-group col-md-12">
        <label>Waktu Test (Menit)</label>
        <input type="number" required name="test_time" class="form-control" placeholder="60" value="{{ $data->test_time }}">
    </div>

    <div class="form-group col-md-12">
        <label>Deskripsi Test</label>
        <textarea name="test_description" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->test_description }}</textarea>
    </div>

    <div class="form-group col-md-12">
        @if ($data->free == 1)
            <input type="checkbox" checked name="free" id="" value="1">
        @else
            <input type="checkbox" name="free" id="" value="1">
        @endif

        <label>Gratis</label>
    </div>



<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
