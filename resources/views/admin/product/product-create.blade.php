@extends('layouts.admin.master-admin')

@section('title', 'Create Product')

@section('description')
    <!-- <div class="section-body">
        <h2 class="section-title">Overview</h2>
        <p class="section-lead">
            Organize all of post as article.
        </p>
    </div> -->

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

@section('breadcrumb')
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('product.show', ['id' => Auth::user()->id]) }}">Product</a></div>
        <div class="breadcrumb-item">Create Product</div>
        <!-- <div class="breadcrumb-item">General Settings</div> -->
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ url('/node_modules/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/dropzone/dist/min/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/select2/dist/css/select2.min.css') }}">
    <style>
        .modal-backdrop{
          display: none;
        }
        .dropzone{
          min-height: 100px !important;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@php
    $language = [
        'English',
        'Indonesian',
        'Mandarin',
        'Hindi',
        'Spanish',
        'French',
        'Arabic',
        'Russian',
        'Portuguese',
        'Bengali',
        'Japanese',
        'Korean',
        'German'
    ];
@endphp

@section('content')
    <div class="row">
        <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Product Data</h4>
                    <span>
                    @if($post->verified == 1)
                      <div class="badge badge-success"><i class="fas fa-check-circle"></i></i><span>Verfied</span></div>
                    @else
                      <div class="badge badge-warning"><i class="fas fa-clock"></i><span>Under Review</span></div>
                    @endif

                    @if($post->status == 1)
                      <div class="badge badge-primary"><span>Published</span></div>
                    @else
                      <div class="badge badge-danger"><span>Draft</span></div>
                    @endif
                    </span>
                  </div>
                  <div class="card-body">

                    <form id="form-id" action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label>Title</label>
                            <input name="title" id="title-id" type="text" class="form-control" value="{{ $post->title }}" required="">
                        </div>

                        <div class="form-group">
                        <label>Slug</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                {{ url('/') }}/p/{{ Auth::user()->username }}
                            </div>
                            </div>
                            <input name="slug" id="slug-id" type="text" value="/{{ $post->slug }}" class="form-control currency">
                            <a href="{{ $post->status == 1 ? url('id/').'/'.$post->slug_cat.'/'.$post->slug : '' }}" target="_blank">
                            <div class="input-group-append">
                            <div class="input-group-text">
                              <i class="fas fa-eye"></i>
                            </div>
                            </div>
                            </a>
                        </div>
                        </div>


                        <div class="form-group">
                          <label>Photo (Max.5)</label>
                          <div class="dropzone" id="photo" name="photo" id="imgInp2" class="form-control">
                          </div>
                        </div>

                        <div data-toggle="tooltip" data-original-title="Click Image to Remove" id="media-id"></div>


                        <div class="form-group">
                        <label>Description</label>
                        <textarea name="content" class="summernote form-control" placeholder="Type a reply ...">{{ $post->post }}</textarea>
                        </div>
                        <div class="form-group text-right">
                        </div>

                        <div class="form-group">
                        <label>Features</label>
                        <textarea name="features" class="summernote form-control" placeholder="Type a reply ...">{{ $post->feature }}</textarea>
                        </div>
                        <div class="form-group text-right">
                        </div>



                  </div>
                  <!-- end card body -->
                </div>

                <div class="card">
                  <div class="card-header">
                    <h4>SEO Data</h4>

                  </div>
                  <div class="card-body">

                        <div class="form-group">
                        <label>Meta Title</label>
                            <input value="{{ $post->meta_title }}" name="meta_title" id="meta-title-id" type="text" class="form-control" value="" required="">
                        </div>


                        <div class="form-group">
                          <label>Meta Description</label>
                          <textarea style="height: 80px;" value="" name="meta_desc" id="meta-desc-id" class="form-control">{{ $post->meta_desc }}</textarea>
                        </div>




                  </div>
                  <!-- end card body -->
                </div>

        </div>
        <!-- end col-md-8 -->

        <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <!-- <h4>Posts Data</h4> -->
                    <a onclick="publish()" id="save-publish" style="width: 100%" class="btn btn-primary nde-white nde-pointer">PUBLISH</a>
                    <br>
                    <div class="text-left" style="margin-top: 20px">
                        <a onclick="draf()" id="save-draft" class="btn btn-outline-light nde-pointer">Save To Draft</a>
                        <a style="margin-left: 20px; margin-top: 8px" target="_blank" href="{{ url('/manage/post/') }}/{{ $post->slug_cat }}/{{ $post->slug }}">Preview</a>


                    </div>
                  </div>
                  <!-- end card body -->
                </div>


                {{-- Stock section --}}
                <div class="card">
                    <div class="card-header">
                        Stock
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label>Set Availability</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <input style="direction:RTL" name="stock" id="stock-id" type="text" value="{{ $post->stock == null ? '10' : $post->stock }}" class="form-control currency">
                                </div>
                                    <input name="stock_name" id="stock-name-id" type="text" value="{{ $post->stock_name == null ? 'Seat' : $post->stock_name }}" class="form-control currency">

                            </div>
                            </div>

                            <div class="form-group">
                                <label class="custom-switch mt-2">
                                  <input {{ $post->always_available == 1 ? 'checked' : '' }} id="always-available-id" type="checkbox" name="always_available" class="custom-switch-input">
                                  <span class="custom-switch-indicator"></span>
                                  <span class="custom-switch-description">Always Available</span>
                                </label>
                              </div>

                    </div>
                    <!-- end card body -->
                  </div>
                  {{-- END Language section --}}



                <div class="card">
                  <div class="card-header">
                        Category & Tag
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <select id="category-id" name="category" type="text" class="form-control" {{ $post->status == '1' ? 'readonly' : '' }}>
                        <option value="">-- Select Category</option>
                        @foreach($categories as $cat)
                          <option value="{{ $cat->product_cat_id }}" {{ $cat->product_cat_id == $post->category_id ? 'selected' : ''}}>{{ $cat->product_cat_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <input id="tag-id" name="tag" type="text" class="form-control" value="{{ $post->tag }}" data-role="tagsinput">
                    </div>
                  </div>
                  <!-- end card body -->
                </div>


                {{-- Language section --}}
                <div class="card">
                    <div class="card-header">
                        Language
                    </div>

                    <div class="card-body">

                    <div class="form-group">
                    <label>
                        Product Language
                        <i style="margin-left:10px" class="fas fa-question-circle" data-toggle="tooltip" data-original-title="Select the language that you use in this article"></i>
                    </label>
                        <select style="width: 100%" name="product_language" class="form-control select2">
                            <option value="">-- Select a language</option>
                            @foreach ($language as $item)
                                @if ($post->product_language == $item)
                                    <option value="{{ $item }}" selected>{{ $item }}</option>
                                @else
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{-- Encode guide language --}}
                    @php
                        $guideLanguage = $post->guide_language;
                        $glSplit = explode(',', $guideLanguage);
                        $savecDl = '';
                    @endphp


                    <div class="form-group">
                    <label>
                        Guide Language
                        <i style="margin-left:10px" class="fas fa-question-circle" data-toggle="tooltip" data-original-title="Choose languages that you can mastered"></i>
                    </label>
                        <select style="width: 100%" name="guide_language[]" class="form-control select2" multiple="">
                            @foreach ($glSplit as $gl)
                                <option value="{{ $gl }}" selected>{{ $gl }}</option>
                            @endforeach
                            @foreach ($language as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>

                    </div>
                    <!-- end card body -->
                  </div>
                  {{-- END Language section --}}


                <div class="card">
                  <div class="card-header">
                        Price & Discount
                  </div>

                  <div class="card-body">

                  <div class="form-group">
                  <label>Adult Price</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                          IDR
                      </div>
                      </div>
                      <input name="adult_price" id="adult-id" type="text" value="" class="form-control currency">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          / Person
                        </div>
                      </div>
                  </div>
                  </div>


                  <div class="form-group">
                  <label>
                      Child Price
                      <i style="margin-left:10px" class="fas fa-question-circle" data-toggle="tooltip" data-original-title="Set 0 if the price of children is not available"></i>
                    </label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                          IDR
                      </div>
                      </div>
                      <input name="child_price" id="child-id" type="text" value="" class="form-control currency">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          / Person
                        </div>
                      </div>
                  </div>
                  </div>


                  <div class="form-group">
                  <label>Discount Percent</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                      </div>
                      <input style="direction:RTL" name="discount_percent" id="d-percent-id" type="text" value="" class="form-control currency">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          %
                        </div>
                      </div>
                  </div>
                  </div>


                  <div class="form-group">
                  <label>Dscount Price</label>
                  <div class="input-group">
                      <div class="input-group-prepend">
                      <div class="input-group-text">
                          IDR
                      </div>
                      </div>
                      <input name="discount_price" id="d-price-id" type="text" value="" class="form-control currency">
                  </div>
                  </div>



                  </div>
                  <!-- end card body -->
                </div>


                <div class="card">
                  <div class="card-header">
                      Product Validity Period
                      <i style="margin-left:10px" class="fas fa-question-circle" data-toggle="tooltip" data-original-title="Select a date range to set your product active. Best for ticket products."></i>
                  </div>

                  <div class="card-body">

                  <div class="form-group">
                    <label>From</label>
                    <input id="v-form-id" name="validity_form" type="text" data-provide="datepicker" value="{{ $post->validity_form }}" class="form-control datepicker">
                  </div>


                  <div class="form-group">
                  <label>To</label>
                    <input id="v-to-id" name="validity_to" type="text" data-provide="datepicker" value="{{ $post->validity_to }}" class="form-control datepicker">
                  </div>

                  </div>
                  <!-- end card body -->
                </div>





                <div class="card">
                  <div class="card-header">
                    Thumbnail
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <div class="dropzone" id="thumbnail" name="thumbnail" id="imgInp" class="form-control">
                      </div>
                    </div>
                    <div class="">
                        <img src="{{ $post->image_thumb }}" style="width:100%" id="blah" alt="">
                    </div>
                  </div>
                  <!-- end card body -->
                </div>
        </div>
        <!-- end col-md-4 -->

        <div class="col-8">

        </div>
        <!-- end col-md-8 -->
        </form>

    </div>

@endsection

@section('script')
    <script src="{{ url('/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ url('/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ url('/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ url('/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ url('/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('/js/rupiah.js') }}"></script>


    <script>

        // get ajax media max 5
        function getMedia() {
          $.get("{{ url('/manage/product/ajax/media') }}/"+{{ $id }}, function( data ) {
            $('#media-id').empty();
            $('#media-id').append(data);
          })
        }

        function removeMedia(id, media, field) {
          $('#notif-remove-media').css('display', 'block');
          var data = {
            id    : id,
            media : media,
            field : field
          }

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          request = $.ajax({
              url: "{{ url('/manage/product/photo/delete') }}/"+ id,
              type: "post",
              data: data,
          });
          request.always(function () {
            getMedia()
          });
        }



        // set zero to discount-percent if discount-price was filled
        $('#d-price-id').on('keyup', function () {
            $('#d-percent-id').val('');
        });

        $('#d-percent-id').on('keyup', function () {
            $('#d-price-id').val('');
        });

        $('#v-form-id').daterangepicker({
          startDate: '{{ $post->validity_from ? $post->validity_from : "2020/01/01" }}',
          locale: {
            format: 'YYYY/MM/DD'
          }
        });

        $('#v-to-id').daterangepicker({
          startDate: '{{ $post->validity_to ? $post->validity_to : "2030/01/01" }}',
          locale: {
            format: 'YYYY/MM/DD'
          }
        });

        rupiah($('#adult-id'));
        rupiah($('#child-id'));
        rupiah($('#d-percent-id'));
        rupiah($('#d-price-id'));


        $("#thumbnail").dropzone({
          url: "/manage/product/thumbnail/" + {{ $id }} ,
          dictDefaultMessage: '<span class="text-center"><span class="visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
          dictResponseError: 'Error uploading file!',
          uploadMultiple: false,
          addRemoveLinks: true,
          maxFiles: 1,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        });

        $("#photo").dropzone({
          url: "/manage/product/photo/" + {{ $id }} ,
          dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
          dictResponseError: 'Error uploading file!',
          uploadMultiple: false,
          // addRemoveLinks: true,
          maxFiles: 5,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          init: function () {
            this.on("complete", function (file) {
              if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                getMedia()
              }
              this.removeFile(file);
            });
          }
        });

        function publish() {
          var serializedData = $('#form-id').serialize();
          var btnPub = $('#save-publish');
          btnPub.addClass('btn-progress');
          request = $.ajax({
              url: "{{ url('/manage/product/publish') }}/"+ {{ $id }},
              type: "post",
              data: serializedData
          });
          request.done(function (response, textStatus, jqXHR){
            btnPub.removeClass('btn-progress');
            location.reload();
          });

          request.fail(function (jqXHR, textStatus, errorThrown){
              console.error(
                  "The following error occurred: "+
                  textStatus, errorThrown
              );
          });

          request.always(function () {
            btnPub.removeClass('btn-progress');
          });
        }

        // move to draf
        function draf() {
          var serializedData = $('#form-id').serialize();
          var btnDraf = $('#save-draft');
          btnDraf.text('Processing . . .');
          request = $.ajax({
              url: "{{ url('/manage/product/save') }}/"+ {{ $id }},
              type: "post",
              data: serializedData
          });
          request.done(function (response, textStatus, jqXHR){
            btnDraf.text('Save To Draft');
          });

          request.fail(function (jqXHR, textStatus, errorThrown){
              console.error(
                  "The following error occurred: "+
                  textStatus, errorThrown
              );
          });

          request.always(function () {
            btnDraf.text('Save To Draft');
          });
        }

        // save without chage status
        function save() {
          var serializedData = $('#form-id').serialize();
          var btnDraf = $('#save-draft');
          btnDraf.text('Processing . . .');
          request = $.ajax({
              url: "{{ url('/manage/product/update') }}/"+ {{ $id }},
              type: "post",
              data: serializedData
          });
          request.done(function (response, textStatus, jqXHR){
            btnDraf.text('Save To Draft');
          });

          request.fail(function (jqXHR, textStatus, errorThrown){
              console.error(
                  "The following error occurred: "+
                  textStatus, errorThrown
              );
          });

          request.always(function () {
            btnDraf.text('Save To Draft');
          });
        }

        $(document).ready(function () {
          getMedia();

          setInterval(function() {
            save();
          }, 300000);

          setTimeout(
          function() {
            // set value to number field
            $('#adult-id').val(formatAngka('{{ $post->adult_price }}'));
            $('#child-id').val(formatAngka('{{ $post->child_price }}'));
            $('#d-percent-id').val(formatAngka('{{ $post->discount_percent }}'));
            $('#d-price-id').val(formatAngka('{{ $post->discount_price }}'));
          }, 500);
        });

        $('.summernote').summernote({
            height: 350,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true,                  // set focus to editable area after initializing summernote
            toolbar: [
              // [groupName, [list of button]]
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strikethrough', 'superscript', 'subscript']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']]
            ],
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

        // Title on keyoup change slug
        $('#title-id').on('keyup', function () {
            if ({{ $post->status }} == '0') {
              setSlug();
            }
        });

        $('#category-id').on('change', function () {
            if ({{ $post->status }} == '0') {
              setSlug();
            }
        });

        function setSlug() {
          var catText   = $('#category-id option:selected').text();
          if (catText == '-- Select Category') {
            catText = '{{ Auth::user()->username }}'
          }
          var titleText = $('#title-id').val();
          slugCat       = replaceSpace(catText);
          slugTitle   = replaceSpace(titleText);
          $('#slug-id').val('/'+slugTitle.substr(1));
          $('#meta-desc-id').val(titleText);
          $('#meta-title-id').val(titleText);
        }

        function replaceSpace(value) {
          var slugA  = '';
          var title  = value.toLowerCase();
          slug       =  title.split(' ');
          for (let i = 0; i < slug.length; i++) {
            if (i <= 5) {
              slugA = slugA + '-' + slug[i];
            }
          }
          return slugA;
        }








    </script>

@endsection
