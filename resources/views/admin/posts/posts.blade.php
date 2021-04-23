@extends('layouts.admin.master-admin')

@section('title', 'Posts Data')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Overview</h2>
        <p class="section-lead">
            Organize all of post as article.
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
    <style>
        
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('modal')

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Posts Data</h4>
                    <div class="text-right"><a onclick="openModalAdd()" class="btn btn-success nde-white nde-pointer">Add New Post</a></div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <!-- <th>Author</th> -->
                                <th>Created At</th>
                                <th>Status</th>
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

        function openModalAdd() {
            window.open("{{ route('post.create') }}");
        }

        $(document).ready(function () {
            
        });

        $(function() {
            $('#users-table').DataTable({
                order: [ 0, 'desc' ],
                processing: true,
                serverSide: true,
                ajax: '{{ route("post.ajax") }}',
                render: 'act',
                columns: [
                    { data: 'post_id', name: 'post_id' },
                    { data: 'act', name: 'act' },
                    { data: 'category_name', name: 'category_name' },
                    // { data: 'author', name: 'author' },
                    { data: 'created-act', name: 'created-act' },
                    { data: 'status-act', name: 'status-act' },
                ],
                
            });
        });


        function remove(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Delete Data?',
                text: "Are you sure to delete data?",
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
                    url : '/manage/post/delete/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Data Deleted',
                        text: 'You can restored this data anytime on history',
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
                        showConfirmButton: false,
                        timer: 1500
                    })
                    }
                });
                }
            });
            }



    </script>

@endsection