<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New Feature Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('feature-cat.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                    <label>Feature Category Name</label>
                        <input required name="feature_category_name" type="text" class="form-control" value="">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Feature Category Description</label>
                        <textarea name="feature_category_description" class="form-control" style="height: 150px" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group col-md-12">
                        <label>Icon</label>
                            <input required name="icon" type="text" class="form-control" value="">
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
