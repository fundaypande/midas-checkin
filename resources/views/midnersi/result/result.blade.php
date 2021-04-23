@extends('layouts.admin.master-admin')

@section('title', 'User Result')

@section('description')
    <div class="section-body">
        <h2 class="section-title">User Result</h2>
        <p class="section-lead">
            Lihat user result
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

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>User Result</h4>
                    {{-- <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Tambah Group Test</a></div> --}}
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>Nama Test</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Result</th>
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
                ajax: '{{ route("result.data") }}',
                columns: [
                    // { data: 'user_id', name: 'user_id' },
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'test_name', name: 'test_name' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'result', name: 'result' },
                ]
            });
        });

        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function detail(id) {
            window.open('{{ url("admin/discussion/") }}/' + id);
        }





    </script>

@endsection
