<!DOCTYPE html>
<html lang="vi|en">
<head>
    <!-- Basehref -->
    <base href="">

    <!-- UTF-8 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <!-- Title, Keywords, Description -->
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('meta_description')">

    <!-- Robots -->
    <meta name="robots" content="index,follow"/>

    <!-- Favicon -->
    <link href="{{ isset($information['favicon']) ? $information['favicon'] :'' }}" rel="shortcut icon" type="image/x-icon"/>

    <!-- Webmaster Tool -->
    <!-- GEO -->
    {!! isset($information['geo-tag']) ? $information['geo-tag'] :'' !!}

    <!-- Author - Copyright -->
    <meta name='revisit-after' content='1 days'/>
    <meta name="author" content="{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] :'' }}"/>
    <meta name="copyright" content="{{ isset($information['coppy-right']) ? $information['coppy-right'] :'' }}"/>

    <!-- Facebook -->
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] :'' }}"/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content="{{ isset($information['favicon']) ? $information['favicon'] :'' }}"/>
    <meta property="og:image:alt" content="{{ isset($information['logo']) ? $information['logo'] :'' }}"/>
    <meta property="og:image:type" content="image/png"/>
    <meta property="og:image:width" content="1280"/>
    <meta property="og:image:height" content="406"/>

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="{{ isset($information['email']) ? $information['email'] :'' }}"/>
    <meta name="twitter:creator" content="{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] :'' }}"/>
    <meta property="og:url" content=""/>
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('meta_description')"/>
    <meta property="og:image" content="{{ isset($information['favicon']) ? $information['favicon'] :'' }}"/>

    <!-- Canonical -->
    <link rel="canonical" href=""/>

    <!-- Chống đổi màu trên IOS -->
    <meta name="format-detection" content="telephone=no">

    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fancybox3/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fancybox3/jquery.fancybox.style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/slick/slick-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/simplyscroll/jquery.simplyscroll.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/simplyscroll/jquery.simplyscroll-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fotorama/fotorama.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fotorama/fotorama-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/magiczoomplus/magiczoomplus.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/owlcarousel2/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/owlcarousel2/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/media.css') }}" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138243386-3">
    </script>

</head>
<body>
<div class="wap_main">
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="{{ asset('/assets/js/addthis_widget.js') }}"></script>
    <ul class="h-card hidden">
        <li class="h-fn fn">{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] : ''}}</li>
        <li class="h-org org">{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] : ''}}</li>
        <li class="h-tel tel">{{ isset($information['hotline']) ? $information['hotline'] : ''}}</li>
        <li><a class="u-url ul" href=""></a></li>
    </ul>
    <h1 class="hidden-seoh">{{ isset($information['ten-cong-ty']) ? $information['ten-cong-ty'] : ''}}</h1>

    @include('site.common.header1')
    @include('site.common.menu_mobile')

    @yield('content')

    @include('site.common.footer')


    <a class="btn-map btn-frame text-decoration-none" target="_blank" href="{{ isset($information['link-map']) ? $information['link-map'] : ''}}">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="{{ asset('assets/images/icon-t6.png') }}" alt="Chỉ đường"></i>
    </a>
    <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/{{ isset($information['zalo']) ? $information['zalo'] : ''}}">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="{{ asset('assets/images/zl.png') }}" alt="Zalo"></i>
    </a>
    <a class="btn-phone btn-frame text-decoration-none" href="tel:{{ isset($information['hotline']) ? $information['hotline'] : ''}}">
        <div class="animated infinite zoomIn kenit-alo-circle"></div>
        <div class="animated infinite pulse kenit-alo-circle-fill"></div>
        <i><img src="{{ asset('assets/images/hl.png') }}" alt="Hotline"></i>
    </a>

    {!! isset($information['messenger']) ? $information['messenger'] : '' !!}

    <script type="text/javascript">
        var NN_FRAMEWORK = NN_FRAMEWORK || {};
        var CONFIG_BASE = '';
        var WEBSITE_NAME =  "@yield('title')";
        var TIMENOW = {{ date('d-m-Y') }};
        var SHIP_CART = false;
        var GOTOP = '{{ asset('/assets/images/top.png') }}';

    </script>
    <script type="text/javascript" src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/bootstrap/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/lazyload.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/simplyscroll/jquery.simplyscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/fotorama/fotorama.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/owlcarousel2/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/magiczoomplus/magiczoomplus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/slick/slick.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/fancybox3/jquery.fancybox.js?') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/functions.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/phantrang_ajax.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/zoom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/apps.js') }}"></script>

    <script>
        $(document).ready(function () {

            /* Chạy slick theo tab cap 2 */
            /*            $(document).on('click', '.list_slick_cat8 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat8').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat8', 'page_slick_cat8', 15, 'product', 'san-pham', 'and noibat>0',1,8);
            });
            init_run_slick_cap2('list_slick_cat8', 'page_slick_cat8', 15, 'product', 'san-pham', 'and noibat>0',1,8);
                        $(document).on('click', '.list_slick_cat11 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat11').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat11', 'page_slick_cat11', 15, 'product', 'san-pham', 'and noibat>0',1,11);
            });
            init_run_slick_cap2('list_slick_cat11', 'page_slick_cat11', 15, 'product', 'san-pham', 'and noibat>0',1,11);
                        $(document).on('click', '.list_slick_cat2 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat2').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat2', 'page_slick_cat2', 15, 'product', 'san-pham', 'and noibat>0',1,2);
            });
            init_run_slick_cap2('list_slick_cat2', 'page_slick_cat2', 15, 'product', 'san-pham', 'and noibat>0',1,2);
                        $(document).on('click', '.list_slick_cat7 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat7').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat7', 'page_slick_cat7', 15, 'product', 'san-pham', 'and noibat>0',1,7);
            });
            init_run_slick_cap2('list_slick_cat7', 'page_slick_cat7', 15, 'product', 'san-pham', 'and noibat>0',1,7);
                        $(document).on('click', '.list_slick_cat4 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat4').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat4', 'page_slick_cat4', 15, 'product', 'san-pham', 'and noibat>0',1,4);
            });
            init_run_slick_cap2('list_slick_cat4', 'page_slick_cat4', 15, 'product', 'san-pham', 'and noibat>0',1,4);
                        $(document).on('click', '.list_slick_cat10 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat10').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat10', 'page_slick_cat10', 15, 'product', 'san-pham', 'and noibat>0',1,10);
            });
            init_run_slick_cap2('list_slick_cat10', 'page_slick_cat10', 15, 'product', 'san-pham', 'and noibat>0',1,10);
                        $(document).on('click', '.list_slick_cat9 a', function(event) {
                event.preventDefault();
                $(this).parent('.list_slick_cat9').find('a').removeClass('active');
                $(this).addClass('active');
                init_run_slick_cap2('list_slick_cat9', 'page_slick_cat9', 15, 'product', 'san-pham', 'and noibat>0',1,9);
            });
            init_run_slick_cap2('list_slick_cat9', 'page_slick_cat9', 15, 'product', 'san-pham', 'and noibat>0',1,9);
            */
            /* Chạy slick theo tab cap 2 */

        });
    </script>

    <script>
        /*$(document).ready(function(){
            var fired77 = false;
            window.addEventListener("scroll", function(){
            if ((document.documentElement.scrollTop != 0 && fired77 === false) || (document.body.scrollTop != 0 && fired77 === false)) {
                $('.load-video-tc').load('ajax/ajax_video_slick.php');
                fired77 = true;
            }
            }, true);
        });*/
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.chay_da, .chay_tc').slick({
                lazyLoad: 'progressive',
                pauseOnHover: true,
                infinite: true,
                accessibility: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                speed: 1000,
                arrows: false,
                centerMode: false,
                dots: true,
                draggable: true,
                vertical: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            variableWidth: false,
                        }
                    },
                    {
                        breakpoint: 1000,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            variableWidth: false,
                        }
                    },
                    {
                        breakpoint: 960,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            infinite: true,
                            variableWidth: false,
                        }
                    },
                    {
                        breakpoint: 700,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            variableWidth: false,
                        }
                    },
                    {
                        breakpoint: 460,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            variableWidth: false,
                        }
                    },
                    {
                        breakpoint: 320,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            variableWidth: false,
                        }
                    }
                ]
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.reaction').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 5,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>

</div>
</body>
</html>