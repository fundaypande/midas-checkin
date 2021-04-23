<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-group">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New User Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('group.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                    <label>Group Name</label>
                        <input required name="role_name" type="text" class="form-control" value="">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Group Description</label>
                        <textarea name="role_sub_title" class="form-control" style="height: 150px" id="" cols="30" rows="10"></textarea>
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
