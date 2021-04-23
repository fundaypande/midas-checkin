@extends('layouts.admin.master-admin')

@section('title', 'User Group Access')

@section('description')
    <div class="section-body">
        <h2 class="section-title">User Group {{ $role->role_name }} </h2>
        <p class="section-lead">
            Set access for user group {{ $role->role_name }}
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
    <link rel="stylesheet" href="{{ url('/css/pande.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>

    </style>
@endsection

@section('breadcrumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('group.show') }}">Group User</a></div>
        <div class="breadcrumb-item">{{ $role -> role_name }}</div>
        <!-- <div class="breadcrumb-item">General Settings</div> -->
    </div>
@endsection

@section('modal')

@endsection

@section('content')
    <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  <h4>User Group {{ $role->role_name }}</h4>
                  </div>
                  <div class="card-body">

                    <?php
                    $featurCounter = count($features);
                    $setengahFeatures = round($featurCounter/2);
                    ?>

                    <h3>System Features</h3>
                    <p>Mark several features that can be accessed by <b>{{ $role->role_name }} Group</b></p>

                    <input type="checkbox" id="checkAll"> Check All

                    <br>
                    <br>


                    {{-- start --}}
                  <form class="" action="{{ route('group.update.access', ['id' => $role->id]) }}" method="post" style="width:100%">
                        {{ csrf_field() }} {{ method_field('POST') }}
                      <div class="row">




                      <div class="col-md-6">

                       @foreach ($master as $keyMast => $mast)

                           <div class="master-role">

                           <div class="master-header">
                             {{ $mast->feature_master_name }}
                           </div>

                           <div class="master-body" id="master-{{ $mast->id }}">
                           @foreach($features->where('feature_master_id', $mast->id) as $key => $fitur)

                             <?php
                               $adaFitur = in_array($fitur -> id, $roleAccess);
                             ?>

                             @if($adaFitur)
                               <div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" value="{{$fitur -> id}}" name="features[]" class="form-check-input" checked> {{$fitur -> feature_name}}</label></div>
                             @else
                               <div class="position-relative form-check"><label class="form-check-label"><input type="checkbox" value="{{$fitur -> id}}" name="features[]" class="form-check-input" > {{$fitur -> feature_name}}</label></div>
                               <input type="hidden" name="" value="{{$fitur -> id}}">

                             @endif

                           @endforeach
                           </div>

                         </div>

                         @if($keyMast == $setengahFeatures-1)
                         <!-- if ini untuk membagi fitur menjadi 2 kolom -->
                         </div>
                         <div class="col-md-6">
                         <!-- end if 2 kolom -->
                         @endif

                       @endforeach


                      </div>

                      <br>
                      <br>




                     </div>
                     <div style="text-align: right;">
                       <button type="submit" class="btn btn-info btn-fill" id="simpan">Simpan Data</button>
                     </div>

                      </form>

                    {{-- end --}}

                </div>
        </div>
    </div>
@endsection

@section('script')


    <script>

        $(document).ready(function () {

        });

        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });






    </script>

@endsection
