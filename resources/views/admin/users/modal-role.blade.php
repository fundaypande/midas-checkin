<div class="modal fade" tabindex="-1" role="dialog" id="modal-role">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Update User Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form id="form-role" action="" method="post">
                @csrf 

                    <div class="form-group col-md-12">
                    <label>Role</label>
                    <select id="role-id" required name="role" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <option value="">-- Select Role</option>
                    </select>
                    </div>


            </div>
        
       
            <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
    </div>
    </div>
</div>
</div>