@extends('layouts.admin.master-soal-template')

@section('title', 'Room Reservation Form')

@section('description')
    {{-- <div class="section-body">
        <h2 class="section-title">Dashboard</h2>
        <p class="section-lead">
            Organize users data and his role.
        </p>
    </div> --}}

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
<link href="/css/jquery.signaturepad.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <style>
        .pad{
            border: 1px solid;
        }
        .sigWrapper{
            border: none;
        }
        .topBarA {
            background: #6777ef;
            color: rgba(255, 255, 255, 0.3);
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            padding: 20px 0;
            text-align: center;
        }

        h2 {
            font-size: 20px !important;
            font-weight: 700 !important;
        }

        .done {
            background-color: #47c363;
        }

        .containerA {
            margin: 0 auto;
            padding: 0 10px;
            max-width: 800px;
        }

        .navBarA {
            background: #6777ef;
            font-size: 16px;
            margin-left: -15px;
             margin-right: -15px;
        }

        .navA {
            margin: 0 -10px !important;
            padding: 0 10px !important;
            list-style: none !important;
            display: flex !important;
            overflow-x: scroll !important;
            flex-wrap: inherit !important;
            -webkit-overflow-scrolling: touch !important;
        }

        .navA > li > a {
            padding: 14px 16px !important;
            display: block !important;
            color: rgba(255, 255, 255, 0.8) !important;
            text-decoration: none !important;
            text-transform: uppercase !important;
            font-size: 12px !important;
            text-align: center !important;
        }

        .navA > li > a.active {
            border-bottom: 2px solid #E64A19 !important;
        }
    </style>
@endsection

@section('content')


    {{-- User biasa login --}}
    <div style=" padding: 20px; min-height: 100vh;  height: 100%; width: 100%;  background-color: white; margin: 0 auto;">

        <div id="persiapan_id">
            <br>
            <br>
        <h2 style="text-align: center;">{{ $info->property_name }}</h2>
            <h3 style="text-align: center;">Room Reservation Form</h3>
            <br>
            <br>
            {{-- form start --}}
            <form action="{{ route('checkin.store') }}" id="idForm" method="post" >
                @csrf
                <div class="custom-switches-stacked mt-2">
                    <label class="custom-switch">
                      <input type="radio" name="tipe_reservation" value="Reservation" class="custom-switch-input" checked>
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description">Reservation</span>
                    </label>
                    <label class="custom-switch">
                      <input type="radio" name="tipe_reservation" value="Amendemant" class="custom-switch-input">
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description">Amendemant</span>
                    </label>
                    <label class="custom-switch">
                      <input type="radio" name="tipe_reservation" value="Cancellation" class="custom-switch-input">
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description">Cancellation</span>
                    </label>
                    <label class="custom-switch">
                        <input type="radio" name="tipe_reservation" value="Waiting" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Waiting</span>
                      </label>
                  </div>



                <div class="form-group col-md-12">
                    <label>Mr./Mrs./Ms First Name *</label>
                    <input type="text" name="nama_depan" class="form-control" id="" required value="">
                </div>

                <div class="form-group col-md-12">
                    <label>Last Name *</label>
                    <input type="text" name="nama_belakang" class="form-control" id="" required value="">
                </div>

                <div class="form-group col-md-12">
                    <label>Company Name *</label>
                    <input type="text" name="company_name" class="form-control" id="" required value="">
                </div>

                <div class="form-group col-md-12">
                    <label>Adrress</label>
                    <textarea name="address" class="form-control" style="height: 50px" id="" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group col-md-12">
                    <label>Email Address *</label>
                    <input type="text" name="email" class="form-control" id="" required value="">
                </div>

                <div class="form-group col-md-12">
                    <label>Phone Number *</label>
                    <input type="text" name="phone_number" class="form-control" id="" required value="">
                </div>

                <div class="form-group col-md-12">
                    <label>Telephone Number</label>
                    <input type="text" name="telephone_num" class="form-control" id="" value="">
                </div>



                <div class="col-md-2">
                    <div class="form-group">
                        <label>Check in *</label>
                    <input id="from_id" name="tanggal_checkin" type="text" data-provide="datepicker" value="{{ date('Y-m-d', strtotime("+0 days")) }}" class="form-control datepicker" required>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Check out *</label>
                        <input id="end_id" name="tanggal_checkout" type="text" data-provide="datepicker" value="{{ date('Y-m-d', strtotime("+1 days")) }}" class="form-control datepicker" required>
                      </div>
                </div>


                <div class="custom-switches-stacked mt-2 form-group">
                    <label>Room Type *</label>
                    @foreach ($rooms as $room)
                        <label class="custom-switch">
                        <input type="radio" name="room_type_id" value="{{ $room->id }}" class="custom-switch-input" checked >
                            <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">{{ $room->room_type }}</span>
                        </label>
                    @endforeach


                  </div>


                <div class="form-group col-md-12">
                    <label>Room Rate *</label>
                    <input type="text" name="room_rate" class="form-control" id="room_rate_id" value="" required>
                </div>

                <div class="form-group col-md-12">
                    <label>Total Pax *</label>
                    <input type="text" name="total_pax" class="form-control" id="total_pax_id" value="" required>
                </div>


                <div class="form-group col-md-12">
                    <label>Billing Instruction</label>
                <textarea name="billing_instruction" class="form-control" style="height: 50px" id="" cols="30" rows="10" readonly>{{ $info->billing_info }}</textarea>
                </div>


                {{-- ttd --}}

                <div class="col-md-12 sigPad">
                    <label class="" for="">Silahkan membuat tandatangan sesuai
                         yang diinginkan :
                    </label>
                    <p class="drawItDesc">Draw your signature</p>
                    <ul class="sigNav">
                      <li class="drawIt"><a href="#draw-it" >Draw It</a></li>
                      <li class="clearButton"><a href="#clear">Clear</a></li>
                    </ul>
                    <div class="sig sigWrapper">
                      <div class="typed"></div>
                      <canvas class="pad" width="250" height="150"></canvas>
                      <input type="hidden" name="output" class="output">
                    </div>

                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <textarea name="signed" id="signature64" hidden cols="30" rows="10"></textarea>

                {{-- end ttd --}}


            <input type="hidden" name="user_id" class="form-control" id="" value="{{ $userId }}">


            <div class="modal-footer bg-whitesmoke br">
            {{-- <button class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>







            </form>






            {{-- form end --}}


        </div>


    </div>




@endsection

@section('script')

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
    <script src="/js/jquery.signaturepad.js"></script>
    <script src="{{ url('/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>


  <script>
    $(document).ready(function() {
      $('.sigPad').signaturePad({drawOnly:true});
    });
  </script>
  <script src="/js/json2.min.js"></script>

    <script>


        $("#idForm").submit(function(e) {


            var canvas = $('.sigPad').signaturePad({drawOnly:true}).getSignatureImage();
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');
            // console.log(form.serialize());
            // console.log(canvas);
            $('#signature64').val(canvas);


            $.ajax({
                type: "POST",
                url: url,
                // data: form.serialize() + '&signed="' + canvas + '"', // serializes the form's elements.
                data: form.serialize(),
                success: function(data)
                {
                    // alert(data); // show response from the php script.
                    window.location.replace("/page/konfirmasi/" + data['user_id']);
                    console.log(data['user_id']);

                }
                });


        });



        $(document).ready(function () {


            roomId = $('input[name="room_type_id"]:checked').val();

            $.get('/page/reservation-room/'+roomId, function( data ) {
                $('#room_rate_id').val(data);
                $('#total_pax_id').val(data);
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#total_id').html('Error get data');
            });
        });


        $('input[name="room_type_id"]').change(function() {
            roomId = $(this).val();

            $.get('/page/reservation-room/'+roomId, function( data ) {
                $('#room_rate_id').val(data);
                $('#total_pax_id').val(data);
            })
            .fail(function (err) {
                console.log('error get ajax feature category with: '+ err);
                $('#total_id').html('Error get data');
            });


        });
    </script>


@endsection
