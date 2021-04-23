@extends('layouts.product.master-product')

@section('title')
    {{ $post->title }}
@endsection

@section('meta')
    {{-- for meta tag --}}
@endsection

@section('css')
    {{-- for css tag --}}
    <style>
        .article-title a {
            text-decoration: none !important;

        }

        .article .article-details{
            padding: 5px !important;
            height: 100px !important;
        }
    </style>
@endsection

@php
    $normalPrice = $post->adult_price;
    $diskonPercent = $post->discount_percent;
    $diskonValue   = $post->discount_price;
    $priceAfterDiskon = $normalPrice;

    if ($diskonPercent > 0) {
        $potongan = ($diskonPercent/100)*$normalPrice;
        $priceAfterDiskon = $normalPrice-$potongan;
    }

    if ($diskonValue > 0) {
        $priceAfterDiskon = $normalPrice-$diskonValue;
    }

    $guideLanguage = $post->guide_language;
    $splitLangu = explode(',', $guideLanguage);
@endphp

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-booking">
        <div class="modal-dialog slideInUp animated modal-mobile" role="document">
        <div class="modal-content">
            <div class="modal-header">
            {{-- <h5 class="modal-title">Add New User</h5> --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
                <div class="modal-body">
                        <div class="price-box">
                            <div class="diskon-price">
                            <p><s>{{ number_format($post->adult_price,0,',','.') }}</s></p>
                            </div>
                            <div class="real-price">
                                <p>{{ number_format($priceAfterDiskon,0,',','.') }}</p>
                            </div>
                            <div class="item-pack">
                            <p>/ {{ $post->stock_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div id="datepicker-mobile"></div>
                        <input type="hidden" id="datepicker-input-mobile" value="{{ date('Y-m-d') }}">

                        <div class="form-group">
                            <label>Guests</label>
                            <select id="mobile-option" class="form-control">
                            @for ($i = 1; $i < 10; $i++)
                                <option value="{{ $i }}">{{ $i }} {{ $post->stock_name }}</option>
                            @endfor
                            </select>
                        </div>
                        <table class="table-total">
                            <tbody>
                                <tr>
                                    <td style="text-align: left" id="left-data-mobile">IDR {{ number_format($priceAfterDiskon,0,',','.') }} x 1 {{ $post->stock_name }} <hr class="hr-total"></td>
                                    <td style="text-align: right" id="right-data-mobile">IDR {{ number_format($priceAfterDiskon,0,',','.') }} <hr class="hr-total"></td>
                                </tr>

                                <tr>
                                    <td style="text-align: left; font-weight: 600">Total</td>
                                    <td style="text-align: right; font-weight: 600" id="price-total-mobile">IDR {{ number_format($priceAfterDiskon,0,',','.') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="box-book-btn">
                            <a href="#" class="btn btn-danger book-btn">
                                BOOK NOW
                            </a>
                        </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
@endsection


@section('sidebar-booking')
    <div class="price-box">
        <div class="diskon-price">
        <p><s>IDR {{ number_format($post->adult_price,0,',','.') }}</s></p>
        </div>
        <div class="real-price">
            <p>IDR {{ number_format($priceAfterDiskon,0,',','.') }}</p>
        </div>
        <div class="item-pack">
        <p>/ {{ $post->stock_name }}</p>
        </div>
    </div>
    <hr>
    <div id="datepicker-web"></div>
    <input type="hidden" id="datepicker-input-web" value="{{ date('Y-m-d') }}">

    <div class="form-group">
        <label>Guests</label>
        <select id="sidebar-option" class="form-control">
        @for ($i = 1; $i < 10; $i++)
            <option value="{{ $i }}">{{ $i }} Person</option>
        @endfor
        </select>
    </div>

    <table class="table-total">
        <tbody>
            <tr>
                <td style="text-align: left" id="left-data-sidebar">IDR {{ number_format($priceAfterDiskon,0,',','.') }} x 1 {{ $post->stock_name }} <hr class="hr-total"></td>
                <td style="text-align: right" id="right-data-sidebar">IDR {{ number_format($priceAfterDiskon,0,',','.') }} <hr class="hr-total"></td>
            </tr>

            <tr>
                <td style="text-align: left; font-weight: 600">Total</td>
                <td style="text-align: right; font-weight: 600" id="price-total-sidebar">IDR {{ number_format($priceAfterDiskon,0,',','.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="box-book-btn">
        <a href="#" onclick="toCart()" class="btn btn-danger book-btn">
            BOOK NOW
        </a>
    </div>

    </div>
@endsection


@section('mobile-booking')
    <div class="mobile-booking">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 35%">
                        <p class="_mb01">IDR {{ number_format($priceAfterDiskon,0,',','.') }}</p>
                        <p class="_mb02">/ {{ $post->stock_name }}</p>
                    </td>
                    <td style="width: 65%">
                    <a onclick="modalBooking()" style="color: white;" class="btn btn-danger book-btn">
                        BOOK NOW
                    </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection



@section('content')
    <div class="section-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">{{ $post->product_cat_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
            </ol>
        </nav>

        <h2>{{ $post->title }}</h2>
        <div class="badge-section">
            <div class="badges">
                <a href="#" class="badge badge-info" style="float:left">
                    <i class="fas fa-user"></i>
                    {{ $author->username }}
                </a>
            </div>

            <div class="badges">
                <span class="badge badge-primary">
                    <i class="fas fa-flag"></i>
                    {{ $post->product_language }}
                </span>
            </div>
        </div>

        <div class="">
            <p>{!! $post->post !!}</p>
        </div>

        @if ($post->guide_language)

            <div class="alert alert-info alert-has-icon">
            <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Languages mastered by guides:</div>
                <ul>
                    @foreach ($splitLangu as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            </div>

        @endif

        <h2>Features</h2>

        <div class="">
            <p>{!! $post->feature !!}</p>
        </div>


    </div>
@endsection








@section('script')
<script src="{{ url('/js/rupiah.js') }}"></script>

<script>

    $(document).ready(function () {


        // sidebar booking process
        $('#sidebar-option').on('change', function () {
            var value = $(this).val();
            $('#left-data-sidebar').empty();
            $('#left-data-sidebar').append('IDR {{ number_format($priceAfterDiskon,0,',','.') }} x '+ value +' {{ $post->stock_name }} <hr class="hr-total">');
            var priceAfterDiskon = '{{ $priceAfterDiskon }}';
            var priceTotal = priceAfterDiskon * value;
            var formatTotal = formatAngka(priceTotal);
            $('#right-data-sidebar').empty();
            $('#right-data-sidebar').append('IDR '+ formatTotal +'  <hr class="hr-total">');

            $('#price-total-sidebar').text('IDR ' + formatTotal);
        });


        // mobile booking process
        $('#mobile-option').on('change', function () {
            var value = $(this).val();
            $('#left-data-mobile').empty();
            $('#left-data-mobile').append('IDR {{ number_format($priceAfterDiskon,0,',','.') }} x '+ value +' {{ $post->stock_name }} <hr class="hr-total">');
            var priceAfterDiskon = '{{ $priceAfterDiskon }}';
            var priceTotal = priceAfterDiskon * value;
            var formatTotal = formatAngka(priceTotal);
            $('#right-data-mobile').empty();
            $('#right-data-mobile').append('IDR '+ formatTotal +'  <hr class="hr-total">');

            $('#price-total-mobile').text('IDR ' + formatTotal);
        });


        $('.main-content').css('min-height', '0');

        if($(window).width() > 1024)
        {
            $.get("{{ url('ajax-desktop') }}/{{ $post->product_id }}", function( data ) {
                $('#section-image').empty();
                $( "#section-image" ).append( data );
                setTimeout(
                    function() {
                    lazyLoadInstance.update();

                }, 1000);
            });
        } else {
            $.get("{{ url('ajax-mobile') }}/{{ $post->product_id }}", function( data ) {
                $('#section-image').empty();
                $( "#section-image" ).append( data );
                setTimeout(
                    function() {
                    lazyLoadInstance.update();

                }, 1000);
            });
        }

        setTimeout(
            function() {
                $.get("{{ url('ajax-other') }}/{{ $post->product_id }}", function( data ) {
                $('#other-post').empty();
                $( "#other-post" ).append( data );
                setTimeout(
                    function() {
                    lazyLoadInstance.update();
                }, 1000);
                $("#users-carousel").owlCarousel({
                    items: 3,
                    margin: 20,
                    autoplay: false,
                    autoplayTimeout: 5000,
                    loop: true,
                    responsive: {
                        0: {
                        items: 2
                        },
                        578: {
                        items: 4
                        },
                        768: {
                        items: 4
                        }
                    }
                });
            });
        }, 2000);


    });

    function toCart() {
        window.location.href = '{{ url("/cart") }}';
    }

    function amountscrolled(){
        var winheight = $(window).height()
        var docheight = $(document).height()
        var scrollTop = $(window).scrollTop()
        var trackLength = docheight - winheight
        var pctScrolled = Math.floor(scrollTop/trackLength * 100) // gets percentage scrolled (ie: 80 NaN if tracklength == 0)
        return pctScrolled;
    }





</script>

@endsection
