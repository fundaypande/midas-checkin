<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('head')
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

    <div id="app">
        <div class="container bg-white py-4 px-3 rounded max-w-screen-md shadow-lg mx-auto">
            <!-- Main Content -->
            <div class="pt-10">
                <section class="">
                    <div class="">

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

                 
                    @yield('content')

                </section>
            </div>

            @include('layouts.public.footer')

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

  </script>

</body>
</html>
