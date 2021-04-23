@extends('layouts.admin.master-admin-user')

@section('title', 'Latihanku')

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


    {{-- User biasa login --}}
    @foreach ($data as $item)
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{ url('admin/start/pembahasan/') }}/{{ $item->test_id }}">
            <div class="card card-statistic-2">
            <div class="card-icon bg-warning">
                <i class="fas fa-award"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>{{ $item-> test_name }} - {{ $item-> created_at }}</h4>
                <span class="badge badge-success">{{ $item-> result }}</span>
                </div>
            </div>
            </div>
            </a>
        </div>
    @endforeach


@endsection

@section('script')
    {{-- <script src="{{ url('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script> --}}


    <script>

        $(document).ready(function () {

            // user
            $('#diskusi_id').click(function () {
                window.location.href = '{{ route("disccusion.show.user") }}';
            });

            $('#profile_id').click(function () {
                window.location.href = '{{ route("profile.show") }}';
            });


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
