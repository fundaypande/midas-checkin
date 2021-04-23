@extends('layouts.admin.master-admin-user')

@section('title', 'Dashboard')

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
    <link rel="stylesheet" href="{{ url('/css/pande.css') }}">

    <style>

    </style>
@endsection

@section('modal')

@endsection

@section('content')
    @if (Auth::user()->role_id == 1)

    <img style="width: 250px; margin: 0 auto; margin-top: 11px" src="{{ url('images/system/logo_600x393.png') }}" alt="">

    <br>

    <br>

    <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('bank.show') }}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-university"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  {{-- <h4>Bank Soal</h4> --}}
                </div>
                <div class="card-body">
                    Bank Soal
                </div>
              </div>
            </div>
            </a>
          </div>


          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('test.show') }}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-address-book"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  {{-- <h4>Group Test</h4> --}}
                </div>
                <div class="card-body">
                    Group Test
                </div>
              </div>
            </div>
            </a>
          </div>


          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('disccusion.show') }}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-users"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  {{-- <h4>Discussion</h4> --}}
                </div>
                <div class="card-body">
                    Discussion
                </div>
              </div>
            </div>
            </a>
          </div>


          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ route('result.show') }}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="fas fa-list"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  {{-- <h4>Nilai Siswa</h4> --}}
                </div>
                <div class="card-body">
                    Nilai Siswa
                </div>
              </div>
            </div>
            </a>
          </div>


    </div>

    <hr>
    <br>

    <div id="show_data" class="row">

        <div class="row">


            {{-- start row --}}
            <div class="col-md-2">
                <div style="    background-color: #ececec;
                height: 200px;
                border-radius: 3px;">

                </div>
            </div>

            <div class="col-md-5">
                <div style="    background-color: #ececec;
                height: 200px;
                border-radius: 3px;">

                </div>
            </div>

            <div class="col-md-5">
                <div style="    background-color: #ececec;
                height: 200px;
                border-radius: 3px;">

                </div>
            </div>

            {{-- end row --}}

        </div>


        <div class="row" style="margin-top: 25px">

            <div class="col-md-5">
                <div style="    background-color: #ececec;
                height: 100px;
                border-radius: 3px;">

                </div>
            </div>

            <div class="col-md-3">
                <div style="    background-color: #ececec;
                height: 100px;
                border-radius: 3px;">

                </div>
            </div>

            <div class="col-md-4">
                <div style="    background-color: #ececec;
                height: 100px;
                border-radius: 3px;">

                </div>
            </div>

        </div>

        </div>
    @else

    {{-- User biasa login --}}
    @foreach ($test as $item)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ url('/admin/start') }}/{{ $item->id }}">
            <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <img style="width: 70%; margin: 0 auto; margin-top: 11px" src="{{ url('images/system/logo_200x200.png') }}" alt="">
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>{{ $item-> test_name }} - {{ $item-> test_time }} Menit</h4>
                <span class="badge badge-success">{{ $item-> total }} Soal</span>
                @if ($item -> free == 1)
                    <span class="badge badge-warning">Gratis</span>
                @endif

                </div>
            </div>
            </div>
            </a>
        </div>
    @endforeach

    <div style="height: 60px; position: fixed; bottom: 0px; background-color: white; width: 100%; padding: 0px 10px 10px 10px">
        <div class="row">
            <div class="col-4">
                <button id="diskusi_id" style="color: #6777ef; font-size: 9px; font-weight: 500;" type="submit" class="btn"><i style="font-size: 24px" class="fas fa-comments"></i><br>Diskusi</button>
            </div>
            <div class="col-4" style="text-align: center;">
                <button id="latihanku_id" style="color: #6777ef; font-size: 9px; font-weight: 500;" type="submit" class="btn"><i style="font-size: 24px" class="fas fa-clipboard-list"></i><br>Latihanku</button>
            </div>
            <div class="col-4" style="text-align: right;">
                <button id="profile_id" style="color: #6777ef; font-size: 9px; font-weight: 500;" type="submit" class="btn"><i style="font-size: 24px" class="fas fa-user"></i><br>Profile</button>
            </div>
        </div>


    </div>


    @endif

@endsection

@section('script')
    {{-- <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script> --}}


    <script>

        $(document).ready(function () {

            // user
            $('#diskusi_id').click(function () {
                window.location.href = '{{ route("disccusion.show.user") }}';
            });

            $('#latihanku_id').click(function () {
                window.location.href = '{{ route("result.show.user") }}';
            });

            $('#profile_id').click(function () {
                window.location.href = '{{ route("profile.show") }}';
            });


            @if (Auth::user()->role_id == 1)
            usersFeature()
            // countResponden()
            groupFeature()
            featureCategoryFeature()
            featureMasterFeature()
            historyFeature()
            discussionAdmin()
            @endif

            $('#show_data').addClass('row');
        });

        // Jangn ini di copy jadikan contoh karena isi empty
        function usersFeature() {
            $('#modal-update-featurecat').modal('show');
            $.get(("{{ route('f.user') }}"), function(data) {
                $('#show_data').empty();
                $('#show_data').html(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').html('<p>Error get data user</p>');
            });
        }

        function groupFeature() {
            $('#modal-update-featurecat').modal('show');
            $.get(("{{ route('f.group') }}"), function(data) {
                $('#show_data').append(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').append('<p>Error get data group</p>');
            });
        }


        function featureCategoryFeature() {
            $('#modal-update-featurecat').modal('show');
            $.get(("{{ route('f.feature-category') }}"), function(data) {
                $('#show_data').append(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').append('<p>Error get data master cetegory</p>');
            });
        }

        // function countResponden() {
        //     $('#modal-update-featurecat').modal('show');
        //     $.get(("{{ route('f.responden') }}"), function(data) {
        //         $('#show_data').append(data);
        //         console.log('data showed');
        //     })
        //     .fail(function (err) {
        //         console.log('error get ajax users feature with: '+ err);
        //         $('#show_data').append('<p>Error get data master cetegory</p>');
        //     });
        // }

        function featureMasterFeature() {
            $('#modal-update-feature-master').modal('show');
            $.get(("{{ route('f.feature-master') }}"), function(data) {
                $('#show_data').append(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').append('<p>Error get data master feature</p>');
            });
        }

        function historyFeature() {
            $('#modal-update-feature-master').modal('show');
            $.get(("{{ route('f.history') }}"), function(data) {
                $('#show_data').append(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').append('<p>Error get data history</p>');
            });
        }

        function discussionAdmin() {
            $('#modal-update-feature-master').modal('show');
            $.get(("{{ route('f.admin.notif') }}"), function(data) {
                $('#show_data').append(data);
                console.log('data showed');
            })
            .fail(function (err) {
                console.log('error get ajax users feature with: '+ err);
                $('#show_data').append('<p>Error get data history</p>');
            });
        }




    </script>

@endsection
