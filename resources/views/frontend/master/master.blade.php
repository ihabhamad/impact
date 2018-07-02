
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content=" width=device-width, initial-scale=1">
    <title>membership</title>
    <!-- Fonts -->

    <link href="https://fonts.googleapis.com/css?family=Lato%7COpen+Sans%7CUbuntu:300,400,500,700" rel="stylesheet">

    <!-- Icons -->

    <link rel="stylesheet" href="{{ asset('front/fonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- CSS assets -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/addons/Magnific-Popup/magnific-popup.css') }}" rel="stylesheet">
    <!-- LOAD slick slider assets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/addons/slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front/addons/slick/slick-theme.css') }}"/>
    <!-- Main theme stylesheet -->
    <link href="{{ asset('front/css/template.css') }}" rel="stylesheet" type="text/css">


</head>

<body>
<div id="page_wrapper">
    <!-- Responsive menu start -->
    <ul class="mm__resMenu">
        <li class="mm__resMenu-back">
            <span class="mm__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="#" class="mm__resMenu-backLink">Back</a>
        </li>
        <li><a class="active" href="#"><span>Home</span></a></li>
        <li><a class="mm__menu-link" href="#about"><span>About</span></a>
        <li><a class="mm__menu-link" href="#pricing"><span>Pricing</span></a></li>
        <li><a class="mm__menu-link" href="#blog"><span>Blog</span></a></li>
        <li><a class="mm__menu-link" href="#blog"><span>Services</span></a></li>
        <li><a href="shop.html"><span>Shop</span></a></li>
        <li><a class="mm__contact" href="{{route('login')}}"><span>LOGIN</span></a></li>

    </ul>
    <!-- Responsive menu end -->
    @include('frontend.partial.header')

    @yield('content')

   @include('frontend.partial.footer')
    <a href="#" class="totop">TOP</a> <!--/.totop -->


</div><!-- /.#page_wrapper -->
<script src="{{ asset('front/js/plugins/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('front/js/plugins/bootstrap.min.js') }}"></script>
<!--isotope script-->
<script src="{{ asset('front/addons/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/addons/slick/slick.min.js') }}"></script>
<script src="{{ asset('front/addons/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/addons/rellax-master/rellax.min.js') }}"></script>
<!--popup script-->
<script src="{{ asset('front/addons/Magnific-Popup/jquery.magnific-popup.js') }}"></script>
<!--count script-->
<script src="{{ asset('front/addons/jquery.countTo.js') }}"></script>
<script src="{{ asset('front/addons/jquery.smooth-scroll.min.js') }}"></script>
<!-- Main template script -->
<script src="{{ asset('front/js/script.js') }}"></script>

</body>
</html>
