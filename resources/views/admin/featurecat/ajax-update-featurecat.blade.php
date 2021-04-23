<form action="{{ route('feature-cat.update', ['id' => $data->id]) }}" method="post">
    @csrf
        <div class="form-group col-md-12">
        <label>Feature Category Name</label>
        <input required name="feature_category_name" type="text" class="form-control" value="{{ $data->feature_category_name }}">
        </div>

        <div class="form-group col-md-12">
            <label>Feature Category Description</label>
            <textarea name="feature_category_description" class="form-control" style="height: 150px" id="" cols="30" rows="10">{{ $data->feature_category_description }}</textarea>
        </div>

        <div class="form-group col-md-12">
            <label>Icon</label>
                <input required name="icon" type="text" class="form-control" value="{{ $data->icon }}">
            </div>

        <div class="form-group col-md-12">
        <label>Satus</label>
        <select required id="aktive" name="aktive" class="form-control">
            <option value="1" {{ $data->aktive==1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $data->aktive==0 ? 'selected' : '' }}>Hidden</option>
        </select>
        </div>


</div>


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
