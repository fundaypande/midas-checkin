<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('head')

    <style>
        .nde-none{
        display: none !important;
        }
        .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
        }
        .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 30px;
        height: 30px;
        margin: 10px;
        border: 4px solid rgb(15, 6, 31);
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: rgba(17, 6, 70, 0.877) transparent transparent transparent;
        }
        .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
        }
        .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
        }
        .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
        }
        @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }
    </style>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/components.css') }}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

@yield('modal')

    <div id="app">
        <div class="main-wrapper">
            @include('layouts.admin.navbar')
            {{-- @if (Auth::user()->role_id == 1) --}}
                @include('layouts.admin.sidebar')
            {{-- @endif --}}

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">

                        @yield('title-icon')
                        <!-- <div class="section-header-back">
                            <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                        </div> -->
                        <h1>@yield('title')</h1>
                        <!-- <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                            <div class="breadcrumb-item">General Settings</div>
                        </div> -->
                        @yield('breadcrumb')
                    </div>

                    <!-- <div class="section-body">
                        <h2 class="section-title">All About General Settings</h2>
                        <p class="section-lead">
                        You can adjust all general settings here
                        </p>
                    </div> -->
                    @yield('description')

                    <!-- Alert -->
                    @if (session('alert-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{ session('alert-success') }}
                        </div>
                    </div>
                    @endif

                    @if (session('alert-warning'))
                    <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{ session('alert-warning') }}
                      </div>
                    </div>
                    @endif

                    @if (session('alert-danger'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>×</span>
                        </button>
                        {{ session('alert-danger') }}
                      </div>
                    </div>
                    @endif

                    <!-- End Alert -->

                    <!-- <div id="output-status"></div>
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>Jump To</h4>
                        </div>
                        <div class="card-body">

                        </div>
                        </div>
                    </div>
                    </div>
                    </div> -->
                    @yield('content')

                </section>
            </div>
            @if (Auth::user()->role_id == 1)
                @include('layouts.admin.footer')
            @endif


        </div>
     </div>


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <script src="{{ url('/assets/js/stisla.js') }}"></script>
  <script src="{{ url('/assets/js/scripts.js') }}"></script>
  <script src="{{ url('/assets/js/custom.js') }}"></script>

  @yield('script')

  <script>

    // $(document).ready(function () {
    //         // fadein alert after 5sec
    //         window.setTimeout(function(){
    //             $('.alert').fadeOut();
    //             // $('.alert').remove();
    //         }, 5000);
    //     });
    $(document).ready(function(){
        $('#reloading').addClass('nde-none');
    });
    // hapus none ketika ada a di klik
    $(document).find( "a" ).on('click', function () {
        $('#reloading').removeClass('nde-none');
        window.setTimeout(function(){
        $('#reloading').addClass('nde-none');
        }, 2000); //<-- Delay in milliseconds
        console.log('removed class');
    });
    $(document).find( "button" ).on('click', function () {
        $('#reloading').removeClass('nde-none');
        window.setTimeout(function(){
        $('#reloading').addClass('nde-none');
        }, 2000); //<-- Delay in milliseconds
        console.log('removed class');
    });

    // document.addEventListener("contextmenu", function(e){
    //     e.preventDefault();
    // }, false);

    // $('body').bind('copy paste',function(e) {
    //     e.preventDefault(); return false;
    // });
  </script>

</body>
</html>
