<form action="{{ route('group.update', ['id' => $data->id]) }}" method="post">
    @csrf
        <div class="form-group col-md-12">
        <label>Group Name</label>
        <input required name="role_name" type="text" class="form-control" value="{{ $data->role_name }}">
        </div>

        <div class="form-group col-md-12">
            <label>Group Description</label>
            <textarea name="role_sub_title" class="form-control" style="height: 150px" id="" cols="30" rows="10">{{ $data->role_sub_title }}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label>Satus</label>
            <select required id="aktive" name="role_status" class="form-control">
                <option value="1" {{ $data->role_status==1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $data->role_status==0 ? 'selected' : '' }}>Hidden</option>
            </select>
            </div>
</div>


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
