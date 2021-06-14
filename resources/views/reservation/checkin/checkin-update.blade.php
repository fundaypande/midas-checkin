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
                    <a href="{{ route('checkin.show') }}">
                        <h4>< Kembali ke Reservation</h4>
                    </a>
                    {{-- <div class="text-right"><a onclick="openModalAdd()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Add New User</a></div> --}}
                  </div>
                  <div class="card-body">


                    {{-- form start --}}
                    <form action="{{ route('checkin.update', ['id' => $data->reservation_id]) }}" method="post">
                        @csrf
                        <div class="custom-switches-stacked mt-2">
                            <label class="custom-switch">
                              <input type="radio" name="tipe_reservation" value="Reservation" class="custom-switch-input" {{ $data->tipe_reservation == 'Reservation' ? 'checked' : '' }}>
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Reservation</span>
                            </label>
                            <label class="custom-switch">
                              <input type="radio" name="tipe_reservation" value="Amendemant" class="custom-switch-input" {{ $data->tipe_reservation == 'Amendemant' ? 'checked' : '' }}>
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Amendemant</span>
                            </label>
                            <label class="custom-switch">
                              <input type="radio" name="tipe_reservation" value="Cancellation" class="custom-switch-input" {{ $data->tipe_reservation == 'Cancellation' ? 'checked' : '' }}>
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Cancellation</span>
                            </label>
                            <label class="custom-switch">
                                <input type="radio" name="tipe_reservation" value="Waiting" class="custom-switch-input" {{ $data->tipe_reservation == 'Waiting' ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Waiting</span>
                              </label>
                          </div>



                        <div class="form-group col-md-12">
                            <label>Mr./Mrs./Ms First Name *</label>
                            <input type="text" name="nama_depan" class="form-control" id="" required value="{{ $data-> nama_depan }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Last Name *</label>
                            <input type="text" name="nama_belakang" class="form-control" id="" required value="{{ $data-> nama_belakang }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Company Name *</label>
                            <input type="text" name="company_name" class="form-control" id="" required value="{{ $data-> company_name }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Adrress</label>
                            <textarea name="address" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->address }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Email Address *</label>
                            <input type="text" name="email" class="form-control" id="" required value="{{ $data-> email }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Phone Number *</label>
                            <input type="text" name="phone_number" class="form-control" id="" required value="{{ $data-> phone_number }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Telephone Number</label>
                            <input type="text" name="telephone_num" class="form-control" id="" value="{{ $data-> telephone_num }}">
                        </div>



                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Check in *</label>
                            <input id="from_id" name="tanggal_checkin" type="text" data-provide="datepicker" value="{{ $data-> tanggal_checkin }}" class="form-control datepicker" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Check out *</label>
                                <input id="end_id" name="tanggal_checkout" type="text" data-provide="datepicker" value="{{ $data-> tanggal_checkout }}" class="form-control datepicker" required>
                              </div>
                        </div>


                        <div class="custom-switches-stacked mt-2 form-group">
                            <label>Room Type *</label>
                            @foreach ($rooms as $room)
                                <label class="custom-switch">
                                <input type="radio" name="room_type_id" value="{{ $room->id }}" class="custom-switch-input" {{ $data->room_type_id == $room->id ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">{{ $room->room_type }}</span>
                                </label>
                            @endforeach


                          </div>

                          <div class="form-group col-md-12">
                            <label>Room No</label>
                            <input type="text" name="no_room" class="form-control" id="" value="{{ $data-> no_room }}">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Room Rate *</label>
                            <input type="text" name="room_rate" class="form-control" id="" value="{{ $data-> room_rate }}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Total Pax *</label>
                            <input type="text" name="total_pax" class="form-control" id="" value="{{ $data-> total_pax }}" required>
                        </div>


                        <div class="form-group col-md-12">
                            <label>Billing Instruction</label>
                            <textarea name="billing_instruction" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->billing_instruction }}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label>Remarks</label>
                            <textarea name="remarks" class="form-control" style="height: 50px" id="" cols="30" rows="10">{{ $data->remarks }}</textarea>
                        </div>


                        <input type="hidden" name="user_id" class="form-control" id="" value="{{ auth()->user()->id }}">


                    <div class="modal-footer bg-whitesmoke br">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>



                    {{-- form end --}}


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
            getTable();
        });



        $("input").change(function() {

            user = $('#user_id').val();
            action = $('#action_id').val();
            feature = $('#feature_id').val();
            from = $('#from_id').val();
            end = $('#end_id').val();

            url = '{{ url("/admin/checkin-repport/datatable") }}/' + from + '/' + end;

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

            url = '{{ url("/admin/checkin-repport/datatable") }}/' + from + '/' + end;

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
                    { data: 'tipe_reservation', name: 'tipe_reservation' },

                    { data: 'nama', name: 'nama' },
                    { data: 'email', name: 'email' },
                    { data: 'phone_number', name: 'phone_number' },
                    { data: 'room_type', name: 'room_type' },

                    { data: 'action', name: 'action' },
                ]
            });
        }


        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function update(id) {
            $('#modal-update-featurecat').modal('show');
            $.get("{{ url('admin/checkin-repport/detail/ajax') }}/"+id, function( data ) {
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
                    url : '/admin/room-type/delete/' + id,
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
