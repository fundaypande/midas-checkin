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

        ol {
           list-style: square !important;
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
            <br>
            <h2>Tahapan Upgrade Ke Level 'User'</h2>

            <p>
                Ketika pertama kali mendaftar di aplikasi Midnersi, pengguna secara default berada pada level 'Pengunjung'. Pada level ini, pengguna
                hanya bisa mengakses soal latihan dengan label 'Gratis', pengguna juga tidak dapat mengakses pembahasan, serta diskusi dengan admin.
                Untuk meningkatkan level pengguna dari 'Pengunjung' ke 'User', berikut tahapannya:
                <ol>
                    <li>Melakukan pembayaran regitrasi ke admin sejumlah <b>Rp.50.000</b> melalui rekening bank berikut :
                         <br>
                        BNI <u>0340584689</u> a/n Putu Dian Prima Kusuma Dewi
                    </li>
                    <li>Lakukan konfirmasi melalui aplikasi whatsapp dengan mengirimkan bukti pembayan ke nomor <b>0896-05637052</b></li>
                    <li>Selesai</li>
                </ol>
            </p>


        </div>


    </div>




@endsection

@section('script')
    {{-- <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}


@endsection
