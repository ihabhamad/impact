<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    <meta name="description" content="{{config('app.name')}}">
    <meta name="author" content="LayoutIt!">

    <link href="{{ asset('adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/css/style.css')}}" rel="stylesheet">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <br><br><br><br><br><br><br><br><br>
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/js/scripts.js')}}"></script>
</body>
</html>
