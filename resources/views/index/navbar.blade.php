<div id="offcanvas-overlay" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <div class="uk-width-1-2@s uk-width-2-5@m">
    <ul class="uk-nav uk-nav-default">
        <li class="uk-active"><a href="#">Active</a></li>
        <li><a href="#">Item</a></li>
        <li><a href="#">Item</a></li>
    </ul>
    </div>
    </div>
</div>

<div class="nde-blue-bg">
<div class="container">
<div class="uk-position-relative">
    
    <!-- start slide -->
    <div class="nde-blue-bg uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider=" autoplay: true; autoplay-interval: 7000;">

    <ul class="uk-slider-items uk-grid uk-grid-match" uk-height-viewport="offset-top: true; offset-bottom: 50">
    <li class="uk-width-3-6">
            <div class="uk-cover-container">
                
                    <div class="columns">
                        <div class="column">
                            <img src="images/promo/slidefour.jpg" width="1000" height="300" alt="" uk-cover>
                            <div class="nde-h2-header">
                                <div class="nde-h2-section">
                                    <h2 class="nde-promo-h2">NEW YEAR SALE</h2>
                                    <span class="nde-promo-span" > <p> Discount for all speed boat package </p></span>
                                    <div class="columns is-mobile">
                                        <div class="column is-one-fifth">
                                            <span class="nde-promo-span"><p>up to</p></span>
                                        </div>
                                        <div class="column">
                                            <span class="nde-promo-sale"> <p>20%</p></span>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                
            </div>
        </li>
        <li class="uk-width-3-6">
            <div class="uk-cover-container">
                
                    <div class="columns">
                        <div class="column">
                            <img src="images/promo/slidesix.jpg" width="1000" height="300" alt="" uk-cover>
                            <div class="nde-h2-header">
                                <div class="nde-h2-section">
                                <h2 class="nde-promo-h2" uk-slider-parallax="x: 100,-100">EASY BOOKING</h2>
                                    <span class="nde-promo-span" > <p uk-slider-parallax="x: 200,-200">Booking tickets for spedboat and attraction immediately in website </p></span>
                                    <div class="columns is-mobile">
                                        <div class="column is-one-fifth">
                                            <!-- <span class="nde-promo-span"><p uk-slider-parallax="x: 300,-300">up to</p></span> -->
                                        </div>
                                        <div class="column">
                                            <!-- <span class="nde-promo-sale"> <p uk-slider-parallax="x: 300,-300">20%</p></span> -->
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                
            </div>
        </li>
        <li class="uk-width-3-6">
            <div class="uk-cover-container">
                
                    <div class="columns">
                        <div class="column">
                            <img src="images/promo/slidetree.jpg" width="1000" height="300" alt="" uk-cover>
                            <div class="nde-h2-header">
                                <div class="nde-h2-section">
                                    <h2 class="nde-promo-h2" uk-slider-parallax="x: 100,-100">SIMPLE PAYMENT</h2>
                                    <span class="nde-promo-span" > <p uk-slider-parallax="x: 200,-200">Paying directly and easily is certainly safe</p></span>
                                    <!-- <div class="columns is-mobile">
                                        <div class="column is-one-fifth">
                                            <span class="nde-promo-span"><p uk-slider-parallax="x: 300,-300">and</p></span>
                                        </div>
                                        <div class="column">
                                            <span class="nde-promo-sale"> <p uk-slider-parallax="x: 300,-300">DONE</p></span>
                                        </div>
                                    </div> -->
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                
            </div>
        </li>
        <!-- <li class="uk-width-3-4">
            <div class="uk-cover-container">
                <img src="images/promo/promo1.jpg" width="700" height="500" alt="" uk-cover>
                <div class="uk-position-center uk-panel"><h1>3</h1></div>
            </div>
        </li> -->
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
    <ul class="uk-slideshow-nav uk-dotnav"></ul>
</div>

</div>
    <!-- end slide -->
    <div  class="uk-container" > 
    <div class="uk-position-top">
        <nav class="uk-navbar-container uk-navbar-transparent" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-iconnav"><a style="color:white" uk-toggle="target: #offcanvas-overlay" uk-icon="icon: menu"></a></li>
                    <li><a style="color:white" class="uk-navbar-item uk-logo nde-white-colors" href="#">Speed Boat</a></li>
                </ul>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li>
                            <?php
                                $currencyFlag = 'rsz_indonesia-flag';
                                $currency = 'IDR';
                                if (Cookie::has('currency')) {
                                    $currency = Cookie::get('currency');
                                    if ($currency == 'IDR') {
                                        $currencyFlag = 'rsz_indonesia-flag';
                                        $currency = 'IDR';
                                    } elseif ($currency == 'USD'){
                                        $currencyFlag = 'rsz_amerika-flag';
                                        $currency = 'USD';
                                    } else {
                                        $currencyFlag = 'rsz_indonesia-flag';
                                        $currency = 'IDR';
                                    }
                                }
                            ?>
                        <a class="nde-white-color" href="#">
                        {{ $currency }} &nbsp&nbsp
                        <figure class="image">
                            
                            <img class="is-rounded" style="width: 30px;" src="{{ url('/images/logo/'.$currencyFlag.'.jpg') }}">
                        </figure>
                        </a>
                        <div class="uk-navbar-dropdown" uk-dropdown="mode: click">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li class="uk-active "><a href="#">
                                    <div class="columns is-mobile">
                                        <a href="{{ route('set.currency', ['currency' => 'IDR']) }}">  
                                            <div class="column"> IDR - Indonesia &nbsp&nbsp</div>
                                        </a> 
                                        <div class="column is-one-fifth" style="padding: 10px 0px;">
                                            <img class="is-rounded" style="width: 30px; border-radius: 50%" src="{{ url('/images/logo/rsz_indonesia-flag.jpg') }}">
                                        </div>                                    
                                    </div>  
                                </a></li>
                                <li class="uk-active "><a href="#">
                                    <div class="columns is-mobile">
                                        <a href="{{ route('set.currency', ['currency' => 'USD']) }}">    
                                            <div class="column"> USD - America &nbsp&nbsp</div>
                                        </a> 
                                        <div class="column is-one-fifth" style="padding: 10px 0px;">
                                            <img class="is-rounded" style="width: 30px; border-radius: 50%" src="{{ url('/images/logo/rsz_amerika-flag.jpg') }}">
                                        </div>                                    
                                    </div>  
                                </a></li>
                            </ul>
                        </div>
                    </li>
                    @guest
                    <li><a href="{{ url('/login') }}">{{ __('Login') }}</a></li>
                    @else
                    <li><a href="{{ url('/home') }}">{{ Auth::user()->name }}</a></li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>
</div>
</div>
