@extends('layouts.admin.master-admin')

@section('title', 'Group Test')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Group Test</h2>
        <p class="section-lead">
            Kelola test dan soal-soal test disini
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
    @include('midnersi.test.modal-add-test')
    @include('midnersi.test.modal-update-test')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Group Test</h4>
                    <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Tambah Group Test</a></div>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Time (Minute)</th>
                                <th>Description</th>
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
                ajax: '{{ route("test.data") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'test_name_m', name: 'test_name_m' },
                    { data: 'test_time', name: 'test_time' },
                    { data: 'test_description_m', name: 'test_description_m' },
                    { data: 'action', name: 'action' },
                ]
            });
        });

        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function soal(id) {
            window.open('{{ url("admin/test/soal/") }}/' + id);
        }

        function update(id) {
            $('#modal-update-featurecat').modal('show');
            $.get("{{ url('admin/test/detail/ajax') }}/"+id, function( data ) {
                $('#show_data').html(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#show_data').html('<p>Error get data</p>');
            });
        }

        function deleteData(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Delete Data?',
                text: "Apa benar anda ingin menghapus data ini?",
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
                    url : '/admin/test/delete/' + id,
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
