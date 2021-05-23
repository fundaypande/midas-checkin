@extends('layouts.admin.master-admin')

@section('title', 'Room Type')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Property Setting</h2>
        <p class="section-lead">
            Property Setting
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

{{-- @section('modal')
    @include('reservation.room-type.modal-add-room-type')
    @include('reservation.room-type.modal-update-room-type')
@endsection --}}

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        {{-- form --}}
                        <form action="{{ route('property.update') }}" method="post">
                            @csrf
                                <div class="form-group col-md-12">
                                    <label>Owner Name *</label>
                                <input type="text" name="owner_name" class="form-control" id="" value="{{ $data->owner_name }}" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Property Name *</label>
                                    <input type="text" name="property_name" class="form-control" id="" value="{{ $data->property_name }}" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Property Address *</label>
                                    <textarea name="property_adress" class="form-control" style="height: 50px" id="" cols="30" rows="10" required>{{ $data->property_adress }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Billing Information *</label>
                                    <textarea name="billing_info" class="form-control" style="height: 50px" id="" cols="30" rows="10" required>{{ $data->billing_info }}</textarea>
                                </div>

                                <input type="hidden" name="user_id" class="form-control" id="" value="{{ auth()->user()->id }}">


                        <div class="modal-footer bg-whitesmoke br">
                        {{-- <button class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>

                        {{-- end form --}}
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
                ajax: '{{ route("room.data") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'room_type', name: 'room_type' },
                    { data: 'room_desc', name: 'room_desc' },
                    { data: 'room_rate', name: 'room_rate' },
                    { data: 'action', name: 'action' },
                ]
            });
        });

        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function update(id) {
            $('#modal-update-featurecat').modal('show');
            $.get("{{ url('admin/room-type/detail/ajax') }}/"+id, function( data ) {
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
