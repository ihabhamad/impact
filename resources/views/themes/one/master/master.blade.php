<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- PAGE TITLE -->
    <title>{{config('app.name')}}</title>

    <!-- FAVICON ICONS -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <link rel="stylesheet" href="{{asset('themes/one/css/business.style.css')}}">
</head>

<body class="gl-business-template gl-home-template">

<div id="gl-circle-loader-wrapper">
    <div id="gl-circle-loader-center">
        <div class="gl-circle-load">
            <img src="{{asset('themes/one/images/ploading.gif')}}" alt="Page Loader">
        </div>
    </div>
</div>

@include('themes.one.partial.header')

    @yield('content')




@include('themes.one.partial.footer')
<script src="{{asset('themes/one/js/jquery.min.js')}}"></script>


<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBF0FPDHlurGkDKua7PfZjpD2fr2rQsRw0&libraries=places"></script>
<script src="{{asset('themes/one/js/google-autocomplete.js')}}"></script>

<script src="{{asset('themes/one/js/plugins.js')}}"></script>
<script src="{{asset('themes/one/js/scripts.js')}}"></script>
<script src={{asset('themes/one/js/main.js')}}></script>
</body>
</html>
