@extends('layouts.admin.master-soal-template')

@section('title', 'Persiapan Test')

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



        {{-- Tampilan Test --}}
        <div id="test_id">

            <div class="row" style="font-size: 20px; font-weight: 800">
                <div class="col-8">Pembahasan {{ $test->test_name}}</div>
                <div style="text-align: right;" class="col-4">
                    {{-- <button type="submit" onclick="klikSelesai()" class="btn btn-success">Selesai</button> --}}
                </div>
            </div>
            <br>

            <div class="row" style="font-weight: 600">
                {{-- <div class="col-6" id="counter_id">0 / {{ $test->total}}</div> --}}
                {{-- <div style="text-align: right;" class="col-6">
                    <span id="time"></span> Menit
                </div> --}}
            </div>

            {{-- Opsion --}}


            <nav class="navBarA">
                <div class="containerA">
                    <ul class="navA nav">
                        @foreach ($soal as $key => $item)
                            @if ($key == 0)
                            <li><a class="active" id="head_{{ $item->id }}" data-toggle="pill" href="#menu_{{ $item->id }}">Soal {{ $key+1 }}</a></li>
                            @else
                            <li><a data-toggle="pill" id="head_{{ $item->id }}" href="#menu_{{ $item->id }}">Soal {{ $key+1 }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </nav>

            {{-- Soal --}}
            <div class="tab-content">
                @foreach ($soal as $key => $item)
                    @if ($key == 0)
                    <div id="menu_{{ $item->id }}" class="tab-pane fade active show">
                        <div style="text-align: center; font-weight: 800">
                            <h3>Soal {{ $key+1 }}</h3>
                        </div>
                        <p>{{ $item->question }}</p>
                        <br>
                        <ul>
                            @foreach ($item->opsi as $opsi)
                                @if ($opsi->point == $item->correct_answare)
                                <li style="color: red"><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                                @else
                                    <li><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                                @endif
                            @endforeach
                        </ul>
                        <br>
                        <h3 style="font-weight: 800">Pembahasan</h3>
                        <p>{{ $item->completion }}</p>
                    </div>

                    @else
                    <div id="menu_{{ $item->id }}" class="tab-pane fade">
                        <div style="text-align: center; font-weight: 800">
                            <h3>Soal {{ $key+1 }}</h3>
                        </div>
                        <p>{{ $item->question }}</p>
                        <br>
                        <ul>
                            @foreach ($item->opsi as $opsi)
                                @if ($opsi->point == $item->correct_answare)
                                    <li style="color: red"><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                                @else
                                    <li><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                                @endif

                            @endforeach
                        </ul>
                        <br>
                        <h3 style="font-weight: 800">Pembahasan</h3>
                        <p>{{ $item->completion }}</p>
                    </div>

                    @endif



                @endforeach

            </div>

        </div>

    </div>




@endsection

@section('script')
    {{-- <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
        var terjawab = 0;
        $(document).ready(function () {

            // total soal yang sudah dijawab

            var asli = 0;

            localStorage.clear();

            // user
            // $('#test_id').hide()
            // $('#hasil_id').hide()



        });








    </script>

@endsection
