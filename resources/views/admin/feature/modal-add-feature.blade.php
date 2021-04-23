<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New Feature</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('feature.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                    <label>Feature Name</label>
                        <input required name="feature_name" type="text" class="form-control" value="">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Feature Description</label>
                        <textarea name="feature_description" class="form-control" style="height: 100px" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                    <label>Feature Master</label>
                    <select required id="fea" name="feature_master_id" class="form-control">
                        <option value="{{ $id }}">{{ $master->feature_master_name }}</option>
                    </select>
                    </div>

                    <div class="form-group col-md-12">
                    <label class="d-block">Properties</label>
                    <div class="form-check form-check-inline">
                        <input name="general" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">General</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="in_menu" class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1">
                        <label class="form-check-label" for="inlineCheckbox2">In Menu</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="aktive" class="form-check-input" type="checkbox" id="inlineCheckbox3" value="1" checked>
                        <label class="form-check-label" for="inlineCheckbox3">Active</label>
                    </div>
                    </div>


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
