<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  @yield('meta')

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

    <link rel="stylesheet" href="{{ url('/node_modules/jquery-ui-dist/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('/assets/css/components.css') }}">

  <style>
      body {
        background-color: #ffffff !important;
        color: rgba(0, 0, 0, 0.84);
        font-size: 18px;

      }

      h1 {
        color: rgba(0, 0, 0, 0.84);
      }



      .section-image{
          max-height: 50vh;
          margin-top: -60px;
      }

      .breadcrumb {
        background-color: #ffffff !important;
        padding: 0px !important;
        font-size: 14px !important;
    }

      .nav-child{
          color: #6c757d !important;
      }

      .nav-child:hover{
          color: #34395e !important;
      }

      .section-header{
          z-index: 1;
      }

      .carousel{
          height: 50vh !important;
      }

      .carousel img{
        height: 50vh !important;
      }

      .slide-1{
        width: 50vw !important;
      }

      .slide-2{
        width: 25vw !important;
      }

      .slide-3{
        width: 25vw !important;
      }

      .slide-head{
          float: left;
      }

      .modal-mobile{
        margin: 0px !important;
        bottom: 0px !important;
        position: absolute !important;
        width: 100% !important;
        max-width: 100% !important;
      }

      .product p{
          line-height: 30px !important;
        }

      @media (min-width: 1024px) {
        .section-header {
            width: 70%;
            margin: 0 auto;
        }

        .product p{
          line-height: 35px !important;
        }

        .footer-container{
            width: 70%;
            margin: 0 auto;
        }

        .mobile-booking{
            display: none;
        }



      }


      @media (max-width: 1024px) {
        .box-sidebar{
            display: none;
        }

        .mobile-booking{
            display: block;
        }

        .section-body {
            margin-right: 0px;
        }

        .main-footer{
            display: none;
        }
        ._owlcb{
            margin-bottom: 50px;
        }
      }



  </style>

  @yield('css')
</head>

<body class="layout-3">
    @yield('modal')


    @yield('mobile-booking')

    <div id="app">
    <div class="">
      <div class="navbar-bg"></div>

      @include('layouts.product.navbar')

      <!-- Main Content -->
      <div class="main-content" style="margin-top: 0px;">
        <section class="section">
          <div class="section-header">
            <h1>Best Package to Mointain Batur</h1>
          </div>

          {{-- start image slide --}}
          <div id="section-image">
          </div>
          {{-- end image slide --}}

        <!-- </div> -->
        <div class="after-slide"></div>

        <div class="main-wrapper container product">
            {{-- start body --}}
            <div class="row no-gutters content-row">

                <div class="col-md-8">
                    <div class="art-body">

                        @yield('content')

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="art-sidebar">
                        <div class="box-sidebar">

                        @yield('sidebar-booking')


                    </div>
                </div>

            </div>
          {{-- end body --}}

                  {{-- other post section --}}

        <div id="other-post">
            <div class="chat-text"></div>
        </div>



        {{-- end other post section --}}

            @include('layouts.product.footer')


        </div>






      </section>
      </div>




    </div>
  </div>
  {{-- end off app --}}

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@13.0.0/dist/lazyload.min.js"></script>

  <script src="{{ url('/assets/js/stisla.js') }}"></script>
  <script src="{{ url('/assets/js/scripts.js') }}"></script>
  <script src="{{ url('/assets/js/custom.js') }}"></script>
  <script src="{{url('/node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>
  <script src="{{ url('/node_modules/jquery-ui-dist/jquery-ui.js') }}"></script>
  <script src="{{ url('/node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>

  @yield('script')

  <script>
        $(function() {
            var dateToday = new Date();
            var dateFormat = "mm/dd/yy";
            var datapick = $('#datepicker-mobile').datepicker({
                dateFormat: "yy-mm-dd",
                minDate: dateToday,
            });
            datapick.on('change', function () {
                var data = $("#datepicker-mobile").datepicker().val();
                $('#datepicker-input-mobile').val(data);
            })
        });

        $(function() {
            var dateToday = new Date();
            var dateFormat = "mm/dd/yy";
            var datapick = $('#datepicker-web').datepicker({
                dateFormat: "yy-mm-dd",
                minDate: dateToday,
            });
            datapick.on('change', function () {
                var data = $("#datepicker-web").datepicker().val();
                $('#datepicker-input-web').val(data);
            })
        });



        var lazyLoadInstance = new LazyLoad({
            elements_selector: ".lazy"
            // ... more custom settings?
        });

        function modalBooking() {
            $('#modal-booking').modal('show');
        }

        // document.addEventListener("scroll", function () {
        //     const height = window.innerHeight|| document.documentElement.clientHeight|| document.body.clientHeight;
        //     var headHeight = (height/2) + 115;

        //     var position = window.pageYOffset || document.documentElement.scrollTop;
        //     var maxButton = position-headHeight;
        //     var body = document.body, html = document.documentElement;


        //     var heightAll = Math.max( body.scrollHeight, body.offsetHeight,
        //                html.clientHeight, html.scrollHeight, html.offsetHeight );

        //     var page = position+height;
        //     var buttonLimit = heightAll-380;
        //     var valueStop = buttonLimit-1700;
        //     console.log(heightAll);
        //     console.log('positn : '+ page);

        //     if (page > buttonLimit) {
        //         $('.box-sidebar').css({
        //             'position': 'absolute',
        //             'top' : valueStop+'px',
        //         });
        //         console.log('stoopp');
        //     } else if (position > headHeight) {
        //         $('.box-sidebar').css({
        //             'position': 'fixed',
        //             'top' : '20px',
        //         });
        //     } else {
        //         $('.box-sidebar').css({
        //             'position': 'absolute',
        //             'top' : '5px',
        //         });
        //     }

        // });





  </script>

  <script>


  </script>

</body>
</html>
