<form action="{{ route('feature.update', ['id' => $data->id]) }}" method="post">
    @csrf
        <div class="form-group col-md-12">
        <label>Feature Name</label>
        <input required name="feature_name" type="text" class="form-control" value="{{ $data->feature_name }}">
        </div>

        <div class="form-group col-md-12">
            <label>Feature Description</label>
            <textarea name="feature_description" class="form-control" style="height: 100px" id="" cols="30" rows="10">{{ $data->description }}</textarea>
        </div>

        <div class="form-group col-md-12">
        <label class="d-block">Properties</label>
        <div class="form-check form-check-inline">
            <input name="general" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" {{ $data->general == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox1">General</label>
        </div>
        <div class="form-check form-check-inline">
            <input name="in_menu" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" {{ $data->in_menu == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox2">In Menu</label>
        </div>
        <div class="form-check form-check-inline">
            <input name="aktive" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" {{ $data->aktive == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox3">Active</label>
        </div>
        </div>
</div>


<div class="modal-footer bg-whitesmoke br">
<button class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
