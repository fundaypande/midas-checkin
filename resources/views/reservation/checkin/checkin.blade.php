@extends('layouts.admin.master-admin')

@section('title', 'Reservation')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Reservation</h2>
        <p class="section-lead">
            Seluruh data Reservation tersedia disini
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
    @include('reservation.checkin.modal-add-checkin')
    @include('reservation.checkin.modal-update-checkin')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Reservation</h4>
                  <div class="text-right"><a href="{{ route('checkin.exsport') }}" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Backup Data</a></div>
                  </div>
                  <div class="card-body">

                    <div class="row">
                        {{-- <div class="col-md-3">
                            <div class="form-group col-md-12">
                                <label>User</label>
                                <select required id="user_id" name="role" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                    <option value="-">-- All User</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group col-md-12">
                                <label>Action</label>
                                <select id="action_id" required id="role_add" name="role" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                    <option value="-">-- All Action</option>
                                    <option value="store">Store</option>
                                    <option value="update">Update</option>
                                    <option value="delete">Delete</option>
                                    <option value="restore">Restore</option>
                                </select>
                                </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group col-md-12">
                                <label>Feature Master</label>
                                <select required id="feature_id" name="role" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                    <option value="-">-- All Feature</option>
                                    @foreach ($feature as $item)
                                        <option value="{{ $item->id }}">{{ $item->feature_master_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div> --}}

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>From Date</label>
                            <input id="from_id" name="validity_form" type="text" data-provide="datepicker" value="{{ date('Y-m-d',strtotime("-1 month")) }}" class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>End Date</label>
                                <input id="end_id" name="validity_form" type="text" data-provide="datepicker" value="{{ date('Y-m-d', strtotime("+1 days")) }}" class="form-control datepicker">
                              </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Total</label>
                                <input disabled id="total_id" type="text" data-provide="datepicker" value="" class="form-control datepicker">
                              </div>
                        </div>
                    </div>

                  <div class="table-responsive">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tanggal</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Room Type</th>
                                <th>Total Pax</th>
                                <th>Download</th>
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
            url = '{{ url("/admin/checkin-repport/datatable") }}/' + from + '/' + end;
            urlTotal = '{{ url("/admin/checkin-repport/data-total") }}/' + from + '/' + end;
            getTable();
            getTotal(urlTotal);
        });


        function pdf(id) {

        }



        $("input").change(function() {

            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();

            url = '{{ url("/admin/checkin-repport/datatable") }}/' + from + '/' + end;
            urlTotal = '{{ url("/admin/checkin-repport/data-total") }}/' + from + '/' + end;

            console.log('change input listened');
            table.ajax.url(url);
            table.draw();

            getTotal(urlTotal);
        });

        $("select").change(function() {

            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();

            url = '{{ url("/admin/checkin-repport/datatable") }}/' + from + '/' + end;
            urlTotal = '{{ url("/admin/checkin-repport/data-total") }}/' + from + '/' + end;

            console.log('change input listened');
            table.ajax.url(url);
            table.draw();
            getTotal(urlTotal);
        });


        function getTotal(url) {
            $.get(url, function( data ) {
                $('#total_id').val(data);
                console.log('data showed total :' + data);
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#total_id').html('Error get data');
            });
        }

        function getTable() {


            table = $('#users-table').DataTable({
                order: [0, 'desc'],
                processing: true,
                serverSide: true,
                ajax: url,
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'tipe_reservation', name: 'tipe_reservation' },

                    { data: 'nama', name: 'nama' },
                    { data: 'email', name: 'email' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'room_type', name: 'room_type' },
                    { data: 'total_pax', name: 'total_pax' },

                    { data: 'pdf', name: 'pdf' },
                    { data: 'action', name: 'action' },
                ]
            });
        }


        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function update(id) {
            location.href = '/admin/checkin-repport/data-update/' + id;
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
                    url : '/admin/checkin-repport/delete/' + id,
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
