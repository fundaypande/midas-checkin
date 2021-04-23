@extends('layouts.admin.master-admin')

@section('title', 'Setting')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Overview</h2>
        <p class="section-lead">
            Organize and adjust all settings about your account.
        </p>
    </div>
    {{-- 
    @if ($errors->has('photo'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $errors->first('photo') }}</p>
            </div>
        </div>
    @endif
    --}}
@endsection

@section('head')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Password Setting</h4>
                  </div>
                  <div class="card-body">
                        <div class="row"> 
                            <div class="col col-md-5">
                                <div class="nde-info">
                                    <div class="nde-info-title">
                                        Hi, Look At Me! 
                                    </div>
                                    <div class="nde-info-desc">
                                        <div>Some important things before pressing the save button</div>
                                        <ul>
                                            <li id="notif-8">Password at least 8 character</li>
                                            <li id="notif-same">New password and password confirm must be same</li>
                                            <li>After changing password, you will log out and then login with a new password</li>
                                            <li>Don't share your new password with anyone else</li>
                                            <li>Remember your password</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-7">
                                <strong>Password Setting</strong>
                                <br>
                                <br>
                                <form action="{{ route('setting.password.save') }}" method="post">
                                    @csrf 
                                    <label>New Password</label>
                                    <input id="password-id" required name="password" type="password" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('password'))
                                        <span style="color: #e65e5e">
                                            <p>{{ $errors->first('password') }}</p>
                                        </span>
                                    @endif

                                    <label>Password Confirm </label>
                                    <input id="cpassword-id" required name="cpassword" type="password" class="form-control {{ $errors->has('cpassword') ? 'is-invalid' : '' }}">
                                    @if ($errors->has('cpassword'))
                                        <span style="color: #e65e5e">
                                            <p>{{ $errors->first('cpassword') }}</p>
                                        </span>
                                    @endif

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>

                                </form>
                            </div>    
                    </div>
                  </div>
                </div>
        </div>
    </div>
@endsection

@section('script')
    

    <script>

        $(document).ready(function () {

        });

        $('#password-id').on('keyup', function () {
            var value = $('#password-id').val();
            var count = value.length;
            if (count < 8) {
                $('#notif-8').addClass('nde-notif-password');
                $(this).addClass('is-invalid');
            } else {
                $('#notif-8').removeClass('nde-notif-password');
                $(this).removeClass('is-invalid');
            }
        });

        $('#cpassword-id').on('keyup', function () {
            var value = $('#cpassword-id').val();
            var value1 = $('#password-id').val();
            
            if (value != value1) {
                $('#notif-same').addClass('nde-notif-password');
                $(this).addClass('is-invalid');
            } else {
                $('#notif-same').removeClass('nde-notif-password');
                $(this).removeClass('is-invalid');
            }
        });


    </script>

@endsection