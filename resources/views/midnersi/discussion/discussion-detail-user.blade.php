@extends('layouts.admin.master-admin-user')

@section('title', 'Diskusi')

@section('description')

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
        .created{
            font-size: 9px;
            margin-top: 10px;
        }
        #messages{
            /* overflow-y: scroll; */
            /* max-height: 100vh; */
            margin: 0 0px;
            background:#fff;
            width: 100%;
            height: 100%;
            min-height: 100vh;
        }
        .messages_class{
            margin: 0 0px;
            background:#fff;
            width: 100%;
        }
        .msg-right{
            background:#3BA1EE;
            padding:10px;
            text-align:right;
            color:#fff;
            margin:5px;
            width:70%;
            float:right;
            margin-right: 30px;
            border-radius: 15px;
        }
        .msg-left{
            background:#ddd;
            padding:10px;
            margin:5px;
            width:70%;
            float:left;
            margin-left: 30px;
            border-radius: 15px;
        }
        .msg-left:before {
        width: 0;
            height: 0;
            content: "";
            top: 8px;
            left: -20px;
            position: relative;
            border-style: solid;
            border-width: 20px 0px 0px 20px;
            border-color: #ddd transparent transparent transparent;

        }
        .msg-right:after {
        width: 0;
            height: 0;
            content: "";
            top: 8px;
            left: 20px;
            position: relative;
            border-style: solid;
            border-width: 20px 20px 00px 0px;
            border-color: #3BA1EE transparent transparent transparent;
        }
    </style>
@endsection

@section('content')
        <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Admin</h4>
                        <div class="text-right"><a onclick="refresh()" id="btn_add_id" class="btn btn-success nde-white nde-pointer">Refresh</a></div>
                    </div> --}}
                    {{-- <div class="card-body"> --}}
                        <div id="chat_id">
                            <p>Loading data . . .</p>
                        </div>
                        <br>
                        <form action="{{ route('disccusion.store.user') }}" id="idForm" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="is_user" value="{{ Auth::user()->id }}">

                    </div>
        {{-- </div> --}}

<div class="row">
    <div class="messages_class" style="height: 60px; position: fixed; bottom: 0px; background-color: white; width: 100%; padding: 10px 10px 10px 10px">
        <div class="row">
            <div class="col-9">
                <textarea id="area_id" placeholder="Tulis pesan disini. . ." required name="chat" class="form-control" style="height: 42px" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="col-3" style="text-align: center;">
                <button type="submit" id="kirim_id" style="width: 100%;" class="btn btn-success"><i style="font-size: 24px" class="fas fa-paper-plane"></i></button>
            </div>
        </div>


    </div>
</div>

</form>

@endsection

@section('script')
    <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script>

        $(document).ready(function () {
            update()
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            // send message
            $("#idForm").submit(function(e) {
                $('#kirim_id').prop('disabled', true);
                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $(this);
                var url = form.attr('action');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    // data: {'_method': 'POST', '_token': csrf_token},
                    success: function(data) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'Data Posted',
                            showConfirmButton: false,
                            timer: 3000,
                            toast: true
                        })
                        update()
                        $('#area_id').val('');
                        $('#kirim_id').prop('disabled', false);
                    },
                    error: function(){
                        Swal.fire({
                            position: 'top-end',
                            type: 'error',
                            title: 'Error! Cannot Send Data',
                            text: 'Check your internet connection',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        $('#kirim_id').prop('disabled', false);
                        console.log('error when push data to remove');
                    }
                });
            });
        });

        function openModalAdd() {
            $('#modal-add-user').modal('show');
        }

        function refresh() {
            update()
        }

        function soal(id) {
            window.open('{{ url("admin/test/soal/") }}/' + id);
        }

        function update(id) {
            $.get("{{ url('admin/discussion/user/ajax') }}", function( data ) {
                $('#chat_id').html(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#chat_id').html('<p>Error get data</p>');
            });
        }






    </script>

@endsection
