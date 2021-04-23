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
            <br>
            <div style="text-align: center;">
                <h2 style="font-weight: 600; font-size: 24px;">{{ $test-> test_name }}</h2>
            </div>

            <br>
            <p>Waktu {{ $test->test_time }} menit</p>
            <p>{{ $test->test_description }}</p>
            <p>
                Test akan dimulai ketika anda mengklik tombol 'Mulai Test' di bawah ini. Jika waktu habis, maka tes akan tertutup dan nilai akan muncul.
            </p>
            <br>
            <div style="text-align: center;">
                <button onclick="mulai()" type="submit" class="btn btn-primary">Mulai Test</button>
            </div>

        </div>

        <div id="hasil_id" style="padding: 20px">
            <br>
            <br>
            <br>
            <div style="text-align: center;">
                <h2 style="font-weight: 600; font-size: 24px;">Selamat Anda Telah Menyelesaikan {{ $test-> test_name }}</h2>
            </div>
            <br>
            <div style="text-align: center;">
                <div>
                    <i style="color: greenyellow; font-size: 100px" class="fas fa-check-circle"></i>
                </div>

            </div>

            <br>
            <div style="text-align: center;">
                <div>
                    <p>Skor</p>
                    <p id="skor_id" style="font-size: 45px;">88</p>
                </div>
                <br>
                <p id="skor_desc" style="font-size: 10px;">Terjawab 20 Soal</p>
            </div>
            <br>
            <br>

            <div style="text-align: center;">
                <button onclick="dashboard()" type="submit" class="btn btn-primary">Dashboard</button>
            </div>

            <br>
            <br>
            <br>

        </div>

        {{-- Tampilan Test --}}
        <div id="test_id">

            <div class="row" style="font-size: 20px; padding: 20px 20px 0px 20px; font-weight: 800">
                <div class="col-8">{{ $test->test_name}}</div>
                <div style="text-align: right;" class="col-4">
                    <button type="submit" onclick="klikSelesai()" class="btn btn-success">Selesai</button>
                </div>
            </div>
            <br>

            <div class="row" style="font-weight: 600; padding: 0px 20px 0px 20px;">
                <div class="col-6" id="counter_id">0 / {{ $test->total}}</div>
                <div style="text-align: right;" class="col-6">
                    <span id="time"></span> Menit
                </div>
            </div>

            {{-- Opsion --}}


            <nav class="navBarA">
                <div class="containerA">
                    <div class="row">
                        <div class="col-2" id="prev_id">
                            <i style="font-size: 30px;
                            color: white;
                            margin-top: 25px; margin-left: 8px;" class="fa fa-chevron-left"></i>
                        </div>
                        <div class="col-8">
                            <ul class="navA nav">
                                @foreach ($soal as $key => $item)
                                    @if ($key == 0)
                                    <li><a class="index_class active" id="head_{{ $key }}" data-toggle="pill" href="#menu_{{ $key }}">Soal {{ $key+1 }}</a></li>
                                    @else
                                    <li><a class="index_class" data-toggle="pill" id="head_{{ $key }}" href="#menu_{{ $key }}">Soal {{ $key+1 }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-2" id="next_id">
                            <i style="font-size: 30px;
                            color: white;
                            margin-top: 25px; margin-left: 5px;" class="fa fa-chevron-right"></i>
                        </div>
                    </div>

                </div>
            </nav>

            {{-- Soal --}}
            <div class="tab-content" style="padding: 10px; min-height: 80vh;">
                @foreach ($soal as $key => $item)
                    @if ($key == 0)
                    <div id="menu_{{ $key }}" class="tab-pane fade active show">
                        <div style="text-align: center; font-weight: 800">
                            <h3>Soal {{ $key+1 }}</h3>
                        </div>
                        <p>{{ $item->question }}</p>
                        <br>
                        <ul>
                            @foreach ($item->opsi as $opsi)
                                <li><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div id="menu_{{ $key }}" class="tab-pane fade">
                        <div style="text-align: center; font-weight: 800">
                            <h3>Soal {{ $key+1 }}</h3>
                        </div>
                        <p>{{ $item->question }}</p>
                        <br>
                        <ul>
                            @foreach ($item->opsi as $opsi)
                                <li><input class="radio_class" type="radio" name="soal_{{ $item->id }}" value="{{ $opsi->point }}" /> {{ $opsi->point }}. {{ $opsi->point_description }}</li>
                            @endforeach
                        </ul>
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

        // $('.navA').scroll(function(){
        //     console.log($(this).scrollLeft());
        // });


        var terjawab = 0;
        $(document).ready(function () {
            // console.log($("div").scrollLeft());


            // KLIK NEXT
            var soalIndex = 0;
            var scrolPosition = 0;
            $('#next_id').click(function () {
                var totalSoal = "{{ $test->total }}";

                if (soalIndex < parseInt(totalSoal)-1) {
                    // console.log('next');
                    soalIndex = soalIndex+1;
                    $('.tab-pane').removeClass('active show');
                    $('.index_class').removeClass('active');
                    $('#menu_'+soalIndex).addClass('active show');
                    $('#head_'+soalIndex).addClass('active');
                    scrolPosition = scrolPosition+60;
                    $('.navA').scrollLeft(scrolPosition);
                }
            });

            $('#prev_id').click(function () {
                // console.log('prev');
                if (soalIndex != 0) {
                    soalIndex = soalIndex-1;
                    $('.tab-pane').removeClass('active show');
                    $('.index_class').removeClass('active');
                    $('#menu_'+soalIndex).addClass('active show');
                    $('#head_'+soalIndex).addClass('active');
                    scrolPosition = scrolPosition-60;
                    $('.navA').scrollLeft(scrolPosition);
                }

            });

            // total soal yang sudah dijawab

            var asli = 0;

            localStorage.clear();

            // user
            $('#test_id').hide()
            $('#hasil_id').hide()

            $(window).bind('beforeunload', function(){
                return 'Pastikan anda sudah selesai melakukan test sebelum menutup halaman ini atau hasil test anda akan hilang';
            });

            @foreach ($soal as $key => $item)
                $('input[name ="soal_{{ $item->id }}"]').click(function () {
                    // console.log('Aku sedang di klik {{ $item->id }}');
                    $('#head_{{ $key }}').addClass('done');
                    terjawab = $('.radio_class:checked').length;
                    // console.log(terjawab);
                    $('#counter_id').text(terjawab + ' / {{ $test->total }}');
                    var answare = $(this).val();

                    if (answare == '{{ $item->correct_answare}}') {
                        localStorage.setItem("{{ $item->id }}", 1);
                    } else {
                        localStorage.setItem("{{ $item->id }}", 0);
                    }
                });

                $('#head_{{ $key }}').click(function () {
                    var soalIdx = $(this).text();

                    var idSoal = soalIdx.split(' ');
                    var idSoalReal = idSoal[1];
                    // console.log(idSoalReal-1);
                    soalIndex = idSoalReal-1;
                    scrolPosition = idSoalReal*60;
                });
            @endforeach
        });

        function klikSelesai() {
            rekap()
            push()
        }

        function rekap() {
            var data = 0;
            var soal = @json($soalId);

            for (let index = 0; index < soal.length; index++) {
                var local = localStorage.getItem(soal[index].id);
                if(local != null) {
                    data = data + parseInt(local);
                }
            }

            var hasil = (data / parseInt({{ $test->total }}))*100;
            // console.log(hasil);

            localStorage.setItem("result", hasil.toFixed(2));
            localStorage.setItem("test_id", {{ $test->id }});


        }

        function dashboard() {
            window.location.href = "{{ url('/admin/dashboard') }}";
        }

        function startTimer(duration, display) {
            var start = Date.now(),
                diff,
                minutes,
                seconds;
            function timer() {
                // get the number of seconds that have elapsed since
                // startTimer() was called
                diff = duration - (((Date.now() - start) / 1000) | 0);

                // does the same job as parseInt truncates the float
                minutes = (diff / 60) | 0;
                seconds = (diff % 60) | 0;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (diff <= 0) {
                    // add one second so that the count down starts at the full duration
                    // example 05:00 not 04:59
                    start = Date.now() + 1000;
                    // console.log('WAKTU HABIISS');
                    alert('Maaf waktu anda sudah habis');
                    rekap()
                    done();
                }
            };
            // we don't want to wait a full second before the timer starts
            timer();
            setInterval(timer, 1000);
        }

        window.onload = function () {

        };

        function mulai() {
            var fiveMinutes = {{ $test->test_time }}*60,
            display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
            $('#test_id').show()
            $('#persiapan_id').hide()
        }

        function push(){
            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            Swal.fire({
                title: 'Yakin selesai?',
                text: "Jika klik selesai anda akan menuju ke halaman hasil",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya Selesai',
                cancelButtonText: 'Belum'
            }).then((result) => {
                if (result.value) {
                    done()
                }
            });
        }

        function done() {

            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Menyimpan data . . .',
                // text: 'Check your internet connection',
                showConfirmButton: false,
                // timer: 3000
            })

            var csrf_token = $('meta[name="crsf_token"]').attr('content');
            $.ajax({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '{{ route("result.store") }}',
                type: "POST",
                data: {'_method': 'POST', '_token': '{{ csrf_token() }}', 'test_id': '{{ $test->id }}', 'result' : localStorage.getItem("result"), 'user_id': {{ Auth::user()->id }}},
                success: function(data) {
                    // console.log('SELESAI PUSH');
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Hasil Tersimpan',
                        // text: 'Check your internet connection',
                        showConfirmButton: false,
                        // timer: 3000
                    })
                    $('#test_id').empty()
                    $('#hasil_id').show()
                    $('#skor_id').text(localStorage.getItem("result"));
                    $('#skor_desc').text('Terjawab ' + terjawab + ' Dari {{ $test->total }} Soal');
                },
                error: function(){
                    Swal.fire({
                        position: 'top-end',
                        type: 'error',
                        title: 'Error! Cannot Push Result',
                        text: 'Check your internet connection',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    console.log('error when push data to remove');
                }
            });
        }


    </script>

@endsection
