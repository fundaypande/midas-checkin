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

    <style>
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
            <form action="{{ route('checkin.store') }}" method="post">
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

                <div class="col-md-12">
                    <label class="" for="">Silahkan membuat tandatangan sesuai
                         yang diinginkan :
                    </label>
                    <br/>
                    <div id="sig" ></div>
                    <br/>
                    <button id="clear" class="btn btn-danger btn-sm">Hapus
                         Tandatangan
                    </button>
                    <textarea id="signature64" name="signed" style="display:
                     none">
                    </textarea>
                </div>

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

    <script>
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
        var can = document.getElementById('sig');
        var ctx = can.getContext('2d');
        can.addEventListener( 'touchstart', onTouchStart, false);

        function onTouchStart(e) {
            ctx.fillRect(0,0,300,300);

        }


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
