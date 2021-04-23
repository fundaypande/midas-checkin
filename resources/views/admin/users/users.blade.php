@extends('layouts.admin.master-admin')

@section('title', 'Users Data')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Overview</h2>
        <p class="section-lead">
            Organize users data and his role.
        </p>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $error }}</p>
            </div>
        </div>
        @endforeach
    @endif
@endsection

@section('head')
    <link rel="stylesheet" href="{{ url('/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('modal')
    @include('admin.users.modal-add-user')
    @include('admin.users.modal-role')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Users Data</h4>
                    <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Add New User</a></div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Provider</th>
                                <th>Email Verified</th>
                                <th>Action</th>
                                <th>Reset Password</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

        function ajaxGetter(link, dbField) {
            var dataAjax = [];
            $.ajax({
                url: link,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    var length = data.length;
                    for (var i = 0; i < length; i++) {
                        dataAjax[i] = data[i].dataField;
                    }
                },
                error: function() {
                    return 'empty!';
                },
            });
            return dataAjax;
        }

        function setField(field, data, css, text) {
            //ketika field diinput maka cek data
            //jika input = data, pasang css error pada field
            field.on('keyup', function(e) {
                $('#fun-warning-field').remove();
                if(jQuery.inArray(field.val(), data) !== -1){
                    field.removeClass('is-valid');
                    field.addClass(css);
                    field.after("<div id='fun-warning-field' class='invalid-feedback'>"+ text +"</div>");
                } else {
                    field.removeClass(css);
                    field.addClass('is-valid');
                    $('#fun-warning-field').remove();
                }
            });
        }

        $(document).ready(function () {
            var data = ajaxGetter("{{ route('profile.email') }}");
            //set field ketika input == data
            setField($('#email'), data, 'is-invalid', 'Email already taken');
        });

        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("users.show.dt") }}',
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'role_name', name: 'role_name' },
                    { data: 'provider', name: 'provider' },
                    { data: 'verified', name: 'verified' },
                    { data: 'action', name: 'action' },
                    { data: 'reset_password', name: 'reset_password' }
                ]
            });
        });

        function openModalAdd() {
            $('#btn_add_id').append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
            $.get("{{ url('admin/users/ajax/role') }}", function( data ) {
                $('#modal-add-user').modal('show');
                $('.spinner-grow').remove();
                $('#role_add').html(data);
            })
            .fail(function (err) {
                console.log('error get ajax roles with: '+ err);
                $('.spinner-grow').remove();
            });

        }

        $('#password-id').on('keyup', function () {
            var value = $('#password-id').val();
            var count = value.length;
            if (count < 8) {
                $(this).addClass('is-invalid');
                $('#warning-pass').css('display', 'block');
            } else {
                $(this).removeClass('is-invalid');
                $('#warning-pass').css('display', 'none');
            }
        });

        function openRole(id) {
            $('#btn-a-'+id).append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
            $.get("{{ url('admin/users/ajax/role') }}/"+id, function( data ) {
                $('#role-id').html(data);
                $('#modal-role').modal('show');
                $('#form-role').attr('action', "{{ url('admin/users/update/role') }}/"+id);
                $('.spinner-grow').remove();
            })
            .fail(function (err) {
                console.log('error get ajax roles with: '+ err);
                $('#role-id').addClass('is-invalid');
                $('#role-id').after('<div class="invalid-feedback">Please reload! Something wendt wrong with this form</div>');
                $('.spinner-grow').remove();
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Delete Data?',
                text: "All of user data will also be deleted. Are you sure to delete data?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : '/admin/users/delete/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Data Deleted',
                        // text: 'You can restored this data anytime on history',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    })
                    location.reload();
                    },
                    error: function(){
                        Swal.fire({
                            position: 'top-end',
                            type: 'error',
                            title: 'Error! Cannot Delete Data',
                            text: 'Check your internet connection',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        console.log('error when push data to remove');
                    }
                });
                }
            });
        }


        function reset_password(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Reset Password?',
                text: "Password will reset to '123456', please tell user for the new password!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I Have!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : '/admin/users/reset/' + id,
                    type: "POST",
                    data: {'_method': 'POST', '_token': csrf_token},
                    success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Password Reset',
                        // text: 'You can restored this data anytime on history',
                        showConfirmButton: false,
                        timer: 3000,
                        toast: true
                    })
                    // location.reload();
                    },
                    error: function(){
                        Swal.fire({
                            position: 'top-end',
                            type: 'error',
                            title: 'Error! Cannot Reset Password Data',
                            text: 'Check your internet connection',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        console.log('error when push data to reset password');
                    }
                });
                }
            });
        }


    </script>

@endsection
