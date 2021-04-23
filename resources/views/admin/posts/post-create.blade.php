@extends('layouts.admin.master-admin')

@section('title', 'Create Post')

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
        <div class="breadcrumb-item active"><a href="{{ route('post.show') }}">Posts</a></div>
        <div class="breadcrumb-item">Create Post</div>
        <!-- <div class="breadcrumb-item">General Settings</div> -->
    </div>
@endsection

@section('head')
    <link rel="stylesheet" href="{{ url('/node_modules/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/dropzone/dist/min/dropzone.min.css') }}">
    <style>
        .modal-backdrop{
          display: none;
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h4>Posts Data</h4>
                    
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
                                {{ url('/') }}/id
                            </div>
                            </div>
                            <input name="slug" id="slug-id" type="text" value="/{{ $post->slug_cat }}/{{ $post->slug }}" class="form-control currency">
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
                        <textarea name="content" class="summernote form-control" placeholder="Type a reply ...">{{ $post->post }}</textarea>
                        </div>
                        <div class="form-group text-right">
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

                <div class="card">
                  <div class="card-header">
                        Category & Tag
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <select id="category-id" name="category" type="text" class="form-control" {{ $post->status == '1' ? 'readonly' : '' }}>
                        <option value="">-- Select Category</option>
                        @foreach($categories as $cat)
                          <option value="{{ $cat->act_category_id }}" {{ $cat->act_category_id == $post->category_id ? 'selected' : ''}}>{{ $cat->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <input id="tag-id" name="tag" type="text" class="form-control" value="{{ $post->tag }}" data-role="tagsinput">
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

        <div class="col-md-8">
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
        </form>

    </div>

@endsection

@section('script')
    <script src="{{ url('/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ url('/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ url('/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ url('/node_modules/dropzone/dist/min/dropzone.min.js') }}"></script>


    <script>

        $("#thumbnail").dropzone({ 
          url: "/manage/post/thumbnail/" + {{ $id }} ,
          dictDefaultMessage: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
          dictResponseError: 'Error uploading file!',
          uploadMultiple: false,
          addRemoveLinks: true,
          maxFiles: 1,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        });

        function publish() {
          var serializedData = $('#form-id').serialize();
          var btnPub = $('#save-publish');
          btnPub.addClass('btn-progress');
          request = $.ajax({
              url: "{{ url('/manage/post/publish') }}/"+ {{ $id }},
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
        
        function draf() {
          var serializedData = $('#form-id').serialize();
          var btnDraf = $('#save-draft');
          btnDraf.text('Processing . . .');
          request = $.ajax({
              url: "{{ url('/manage/post/save') }}/"+ {{ $id }},
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
              url: "{{ url('/manage/post/update') }}/"+ {{ $id }},
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
          setInterval(function() {
            save();
          }, 300000);
        });

        $('.summernote').summernote({
            height: 700,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
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
            catText = 'post'
          }
          var titleText = $('#title-id').val();
          slugCat       = replaceSpace(catText);
          slugTitle   = replaceSpace(titleText);
          $('#slug-id').val('/'+slugCat.substr(1)+'/'+slugTitle.substr(1));
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