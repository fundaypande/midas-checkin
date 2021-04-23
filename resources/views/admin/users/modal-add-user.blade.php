<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-user">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                <form action="{{ route('users.store') }}" method="post">
                @csrf
                    <div class="form-group col-md-12">
                    <label>Full Name</label>
                    <input required name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-12">
                    <label>Email</label>
                    <input required name="email" id="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                    </div>

                    <div class="form-group col-md-12">
                    <label>Role</label>
                    <select required id="role_add" name="role" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                    </select>
                    </div>

                    <div class="form-group col-md-12">
                    <label>Password</label>
                    <input id="password-id" required name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" value="{{ old('name') }}">
                    <p style="color:red; display:none" id="warning-pass">Password at least 8 character</p>
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
