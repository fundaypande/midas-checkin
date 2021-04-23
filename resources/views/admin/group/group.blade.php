@extends('layouts.admin.master-admin')

@section('title', 'User Group')

@section('description')
    <div class="section-body">
        <h2 class="section-title">User Group Management</h2>
        <p class="section-lead">
            Make new role for user group and determine the access
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
    @include('admin.group.modal-add-group')
    @include('admin.group.modal-update-group')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Group User</h4>
                    <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Add New Group User</a></div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Group Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Access</th>
                                <th>Action</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

        $(document).ready(function () {

        });

        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("group.data") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'role_name', name: 'role_name' },
                    { data: 'role_sub_title', name: 'role_sub_title' },
                    { data: 'aktive', name: 'aktive' },
                    { data: 'access', name: 'access' },
                    { data: 'action', name: 'action' },
                ]
            });
        });

        function openModalAdd() {
            $('#modal-add-group').modal('show');
        }

        function update(id) {
            $('#modal-update-group').modal('show');
            $.get("{{ url('admin/groups/detail/ajax') }}/"+id, function( data ) {
                $('#show_update_group').html(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#show_update_group').html('<p>Error get data</p>');
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Delete Data?',
                text: "Remove data will hide all feature with this category in sidebar menu. Realy to delete?",
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
                    url : '/admin/groups/delete/' + id,
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




    </script>

@endsection
