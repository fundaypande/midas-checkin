@extends('layouts.admin.master-admin')

@section('title', 'History Data')

@section('description')
    <div class="section-body">
        <h2 class="section-title">History</h2>
        <p class="section-lead">
            From this page you can see activity of all member in system. You also can restore data that have been deleted by some user.
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
    <link rel="stylesheet" href="{{ url('/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('modal')
    @include('admin.history.modal-detail-history')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Data</h4>
                    {{-- <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Add New User</a></div> --}}
                  </div>
                  <div class="card-body">

                    <div class="row">

                        @php

                            $data = [120, 100, 230, 220, 140, 220, 140, 169, 165, 210, 200, 143];
                            $dataForcash = [];
                            $dataForcash[0] = $data[0];
                            $const = 0.9;

                            for ($i=1; $i < count($data); $i++) {
                                $dataForcash[$i] = $dataForcash[$i-1] + $const * ($data[$i-1] - $dataForcash[$i-1]);
                            }


                        @endphp

                            <div class="col-md-3">
                                <h3>Data Aktual</h3>
                                @foreach ($data as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>

                            <div class="col-md-3">
                                <h3>Ramalan</h3>
                                @foreach ($dataForcash as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </div>




                    </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

        var table;
        var user = $('#user_id').val();
        var action;
        var feature;
        var from;
        var end;
        var url;

        $(document).ready(function () {
            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();
            url = '{{ url("/admin/history/datatable") }}/'+ user +'/' + action + '/' + feature + '/' + from + '/' + end;
            getTable();
        });



        $("input").change(function() {

            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();

            url = '{{ url("/admin/history/datatable") }}/'+ user +'/' + action + '/' + feature + '/' + from + '/' + end;

            console.log('change input listened');
            table.ajax.url(url);
            table.draw();
        });

        $("select").change(function() {

            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();

            url = '{{ url("/admin/history/datatable") }}/'+ user +'/' + action + '/' + feature + '/' + from + '/' + end;

            console.log('change input listened');
            table.ajax.url(url);
            table.draw();
        });

        function getTable() {


            table = $('#users-table').DataTable({
                order: [0, 'desc'],
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'name', name: 'name' },
                    { data: 'aksi', name: 'aksi' },
                    { data: 'feature_master_name', name: 'feature_master_name' },
                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action' }
                ]
            });
        }

        function restore(id){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Restore Data?',
                text: "Data that has been deleted by the user will be restore",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, I Agree!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url : '/admin/history/restore/' + id,
                    type: "POST",
                    data: {'_method': 'POST', '_token': csrf_token},
                    success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Data Restored',
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
                            title: 'Error! Cannot Reset Password Data',
                            text: 'Check your internet connection',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        console.log('error when push data to restore');
                    }
                });
                }
            });
        }


        function detail(id) {
            $('#modal-detail').modal('show');
            $.get("{{ url('admin/history/detail') }}/"+id, function( data ) {
                $('#show_detail').html(data);
            })
            .fail(function (err) {
                console.log('error get ajax roles with: '+ err);
                $('#show_detail').html('<p>Error get data</p>');
            });
        }



    </script>

@endsection
