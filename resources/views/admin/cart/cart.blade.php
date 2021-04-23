@extends('layouts.product.master-cart')

@section('title')
    Testing
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

@endphp

@section('modal')

@endsection


@section('mobile-booking')
    <div class="mobile-booking">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td style="width: 35%">
                        <p class="_mb01">IDR 45000</p>
                        <p class="_mb02"> </p>
                    </td>
                    <td style="width: 65%">
                    <a onclick="modalBooking()" style="color: white;" class="btn btn-danger book-btn">
                        CONFIMATION
                    </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection



@section('cart')
    <div class="card" style="min-height: 50vh">
        <div class="card-header">
        <h4>My Cart</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img style="width: 100%" src="{{ url('images/fastboat/nacha.jpg') }}" alt="">
                </div>
                <div class="col-md-8">
                    <h4>Bact Package On Batur</h4>
                    <p>Total IDR 400.000 On 09/12/2020</p>
                    <div class="row">
                        <div class="col-5" style="float:left">
                            <select style="width: 100%" class="form-control" name="" id="">
                                <option value="">1 Person</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <button style="width: 100%; height: 40px" class="btn btn-primary book-btn"> Change Date </button>
                        </div>
                        <div class="col-1">
                            <button style="width: 100%; height: 40px" class="btn btn-danger"> <i class="fas fa-trash"></i> </button>
                        </div>
                    </div>

                </div>

            </div>
            <br>
            <button style="width: 100%;" class="btn btn-danger book-btn"> Confirmation </button>
        </div>

    </div>
@endsection








@section('script')
<script src="{{ url('/js/rupiah.js') }}"></script>

<script>

    $(document).ready(function () {



        $('.main-content').css('min-height', '0');

        setTimeout(
                    function() {
                    lazyLoadInstance.update();

                }, 1000);

        setTimeout(
            function() {
                $.get("{{ url('ajax-other') }}/1", function( data ) {
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







</script>

@endsection
