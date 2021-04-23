
    @extends('layouts.admin.master-admin-user')



@section('title', 'Profile')

@section('description')
    <div class="section-body">
        <h2 class="section-title">Hi, {{ Auth::user()->nickName() }}</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>
    </div>
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
@endsection

@section('head')
<meta name="_token" content="{{ csrf_token() }}">
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" /> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <style>
        .avatar-item{
            cursor: pointer;
        }
        img {
        display: block;
        max-width: 100%;
        }
        .preview {
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
        border: 1px solid red;
        }
        .modal-lg{
        max-width: 1000px !important;
        }
    </style>
@endsection

@section('modal')
    @include('profile.modal-photo-profile')

<div class="modal fade" tabindex="-1" role="dialog" id="modal-profile">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Update Photo Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="text-center">
                <div class="profile-widget-picture">
                    <img style="height: 120px;" id="blah" alt="image" src="{{ url(Auth::user()->photoProfile()) }}" class="img-fluid" data-toggle="tooltip" title="">
                </div>
                <br>
                <form action="{{ route('profile.photo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type='file' id="imgInp" class="form-control image" name="photo"/> --}}
            </div>
        </div>

        <br>


            <div class="modal-footer bg-whitesmoke br">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
    </div>
    </div>
</div>
</div>
@endsection

@section('content')


<br>
<div class="">
<div class="card profile-widget">
    <div class="profile-widget-header">
    <div class="rounded-circle profile-widget-picture avatar-item" id="avatar_id">

            <img alt="image" src="{{ Auth::user()->photoProfile() }}" class="img-fluid" data-toggle="tooltip" title="" data-original-title="Change your photo profile">
            <div class="avatar-badge" title="" data-toggle="tooltip"><i class="fas fa-pencil-alt"></i></div>
            <input type='file' id="imgInp" class="form-control image" name="photo" style="padding: 7px 5px;"/>
    </div>
    <div class="profile-widget-items">
        <div class="profile-widget-item">
            <div class="profile-widget-item-value">{{ Auth::user()->name }}</div>
        </div>
    </div>
    </div>
    <form action="{{ route('profile.save') }}" method="POST">
    @csrf
    <div class="profile-widget-description">
    <div class="row">
        <div class="form-group col-md-8">
        <label>Full Name</label>
        <input required name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ Auth::user()->name ? Auth::user()->name : '' }}">
        @if ($errors->has('name'))
            <span style="color: #e65e5e">
                <p>{{ $errors->first('name') }}</p>
            </span>
        @endif
        </div>

        <div class="form-group col-md-4">
        <label>Username</label>
        <input id="username" required name="username" type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" value="{{ Auth::user()->username ? Auth::user()->username : '' }}">
        <div class="amt_err"></div>
        @if ($errors->has('username'))
            <span style="color: #e65e5e">
                <p>{{ $errors->first('username') }}</p>
            </span>
        @endif
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-7 col-12">
        <label>Email</label>
        <input readonly type="email" class="form-control" value="{{ Auth::user()->email ? Auth::user()->email : '' }}" required="">
        <div class="invalid-feedback">
            Please fill in the email
        </div>
        </div>
        {{-- <div class="form-group col-md-5 col-12">
        <label>Phone</label>
        <input name="phone" required id="phone_id" type="tel" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" value="{{ Auth::user()->phone ? Auth::user()->phone : '' }}">
        @if ($errors->has('phone'))
            <span style="color: #e65e5e">
                <p>{{ $errors->first('phone') }}</p>
            </span>
        @endif
        </div> --}}
    </div>

    {{-- <div class="row">
        <div class="form-group col-md-5 col-12">
        <div class="form-group">
            <label>Gender</label>
            <select required name="gender" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}">
            <option value="" {{ Auth::user()->men == null ? 'selected' : '' }}>-- Select Gender</option>
            <option value="1" {{ Auth::user()->men == 1 ? 'selected' : '' }}>Male</option>
            <option value="0" {{ Auth::user()->men == 0 ? 'selected' : '' }}>Female</option>
            </select>
            @if ($errors->has('gender'))
                <span style="color: #e65e5e">
                    <p>{{ $errors->first('gender') }}</p>
                </span>
            @endif
        </div>
        </div>
        <div class="form-group col-md-7 col-12">
        <div class="form-group">
            <label>Nationality</label>
            <select required name="nationality" class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" id="nationality_id">
            <option value="">-- Select Nationality</option>
            </select>
            @if ($errors->has('nationality'))
                <span style="color: #e65e5e">
                    <p>{{ $errors->first('nationality') }}</p>
                </span>
            @endif
        </div>
        </div>
    </div> --}}

    <!-- <div class="row">
        <div class="form-group col-12">
        <label>Bio</label>
            <textarea class="form-control summernote-simple" style="display: none;">
            </textarea>
        </div>
    </div> -->
    <div class="row">
        <div class="form-group mb-0 col-12">
        <div class="custom-control custom-checkbox">
            <input checked type="checkbox" name="subscribe" value="1" class="custom-control-input" id="newsletter">
            <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
            <div class="text-muted form-text">
                You will get new information about products, offers and promotions
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</div>
</div>
</form>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
              image.src = url;
              $modal.modal('show');
            };
            var reader;
            var file;
            var url;

            if (files && files.length > 0) {
              file = files[0];

              if (URL) {
                done(URL.createObjectURL(file));
              } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function (e) {
                  done(reader.result);
                };
                reader.readAsDataURL(file);
              }
            }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
              aspectRatio: 1,
              viewMode: 3,
              preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
           cropper.destroy();
           cropper = null;
        });

        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
              });

            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                 reader.readAsDataURL(blob);
                 reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('profile.ajax') }}",
                        data: {'_token': $('meta[name="_token"]').attr('content'), 'photo': base64data},
                        success: function(data){
                            $modal.modal('hide');
                            Swal.fire({
                                position: 'top-end',
                                type: 'success',
                                title: 'Photo profile changed',
                                showConfirmButton: false,
                                timer: 3000,
                                toast: true
                            })
                            location.reload();
                        }
                      });
                 }
            });
        })

        </script>

    <script>


        // usernae ragex
        $('input[name="username"]').keyup(function(){
            var data = $(this).val();
            var regx = /^[a-z0-9_-]{3,15}$/;

            console.log( data + ' patt:'+ data.match(regx));

            if ( data === '' || data.match(regx) ){
                $('.amt_err').fadeOut('slow');
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
            else {
                $('.amt_err')
                    .text('Alphanumeric string that may include _ and -')
                    .css({'color':'#fff', 'background':'#990000', 'padding':'3px'})
                    .fadeIn('fast');
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
            }
        });


        function ajaxGetter(link, dbField) {
            var dataAjax = [];
            $.ajax({
                url: link,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                // console.log(data);
                // console.log(data[0].kode_barang);
                var length = data.length;
                // return data pada field database harus dengan nama 'dataField'
                for (var i = 0; i < length; i++) {
                    dataAjax[i] = data[i].dataField;
                }
                },
                error: function() {
                return 'empty!';
                },
            });
            return dataAjax;
        }

        function setField(field, data, css, text) {
            //ketika field diinput maka cek data
            //jika input = data, pasang css error pada field
            field.on('keyup', function(e) {
                $('#fun-warning-field').remove();
                if(jQuery.inArray(field.val(), data) !== -1){
                    field.removeClass('is-valid');
                    field.addClass(css);
                    field.after("<div id='fun-warning-field' class='invalid-feedback'>"+ text +"</div>");
                } else {
                    field.removeClass(css);
                    field.addClass('is-valid');
                    $('#fun-warning-field').remove();
                }
            });
        }

        $(document).ready(function () {
            //get sebuah data dari link get dengan ajax
            var data = ajaxGetter("{{ route('profile.username') }}");
            //set field ketika input == data
            setField($('#username'), data, 'is-invalid', 'Username already taken');

            // $.get("", function( data ) {
            //     $('#nationality_id').html(data);
            //     $('#nationality_id').removeClass('is-invalid');
            //     $('.invalid-feedback').remove();
            // })
            // .fail(function (err) {
            //     console.log('error get ajax country with: '+ err);
            //     $('#nationality_id').addClass('is-invalid');
            //     $('#nationality_id').after('<div class="invalid-feedback">Please reload! Something went wrong with this form</div>');
            // });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

        function sendEmail() {
            $('#alert_email').append('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>');
            $.ajax({
                url: "{{ route('email.verify') }}",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('.spinner-grow').remove();
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Verification Email Was Send',
                        text: "Check your email, if doesn't show, please check your email spam or re-send verification email by click again 'Send Verification Email'",
                        showConfirmButton: true,
                        timer: 10000,
                        // toast: true
                    })

                },
                error: function() {
                    $('.spinner-grow').remove();
                    Swal.fire({
                        position: 'top-end',
                        type: 'error',
                        title: 'Error! Cannot Sending Email',
                        text: 'Check your internet connection',
                        showConfirmButton: true,
                        timer: 7000
                    })
                },
            });


        }

    </script>

@endsection
