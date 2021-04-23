@extends('layouts.admin.master-admin-user')

@section('title', 'Change Password')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Change Password 2</h2>
        <p class="section-lead">
            Change your password account in this page
        </p>
    </div>

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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('modal')

@endsection

@section('content')

            <div class="card">
                <div class="card-body">
                <div class="row">

                    <div class="col-md-6" style="text-align: center;">
                        <img style="width: 80%; " src="{{ url('images/system/bg-password.png') }}" alt="icon password">
                    </div>

                <div class="col-md-6">
                    <form style="margin-top: 25px;" action="{{ route('profile.password.store') }}" method="post">
                        @csrf
                        <div class="form-group col-md-12">
                            <label>Current Password</label>
                            <input required name="current_password" type="password" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-12">
                            <label>New Password</label>
                            <input required name="new_password" type="password" class="form-control" value="">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Password Confirmation</label>
                            <input required name="confirmation_password" type="password" class="form-control" value="">
                        </div>
                        <button style="float: right;margin-right: 15px;" type="submit" class="btn btn-primary">Change Password</button>

                    </form>
                </div>


            </div>


                </div>
            </div>

@endsection

@section('script')


    <script>

        $(document).ready(function () {

        });

    </script>

@endsection
