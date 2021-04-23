<form action="{{ route('feature.update.master', ['id' => $data->id]) }}" method="post">
    @csrf
        <div class="form-group col-md-12">
        <label>Feature Master Name</label>
        <input required name="feature_master_name" type="text" class="form-control" value="{{ $data->feature_master_name }}">
        </div>

        <div class="form-group col-md-12">
            <label>Slug</label>
                <input required name="slug" type="text" class="form-control" value="{{ $data->slug }}">
            </div>

        <div class="form-group col-md-12">
            <label>Feature Master Description</label>
            <textarea name="feature_master_description" class="form-control" style="height: 100px" id="" cols="30" rows="10">{{ $data->feature_master_description }}</textarea>
        </div>

        <div class="form-group col-md-12">
        <label>Feature Category (Master Menu)</label>
        <select required id="fea" name="feature_category_id" class="form-control">
            <option value="">-- Select Category</option>
            @foreach ($featureCat as $item)
                <option value="{{ $item->id }}" {{ $item->id == $data->feature_category_id ? 'selected' : '' }}>{{ $item->feature_category_name }}</option>
            @endforeach
        </select>
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
