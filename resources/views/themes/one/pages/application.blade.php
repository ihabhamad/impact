@extends('frontend.master.master')
@section('content')

    <div class="mm-subheader" style = "background-image: url({{asset("uploads/applications/$application->image")}})" id="home">

        <div class="custom-width-container custom-height-container container flex">
            <div class="row flex-center xs-flex-top">
                <div class="col-md-12 col-sm-12">
                    <div class="title-block">
                        <h1 class="home-heading">{!! wordwrap($application->title , 1 , "<br>\n") !!}


                        </h1>

                    </div>

                </div>
            </div>
        </div>

    </div><!--end subheader-->
    <!--start about section-->
    <section id="about" class="page-section pgt-135 pgb-135">
        <div class="container custom_width">
            <div class="title-block">

            </div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4>	<i class="icon fa fa-check"></i>@if(session()->has('message_title')) {{ session()->get('message_title') }} @else success! @endif</h4>
                    {{ session()->get('message') }}
                </div>
            @endif
            <p class="about-text txt-center txt-black ">{!! $application->content !!}</p>


        </div><!--end container -->
        @guest()
            <a href="{{route('login')}}" class="btn btn--extralg btn--round btn--fullwhite txt-center" style="display: block; width:200px ; margin:0 auto"> Loign </a>
        @else
            <a href="#" class="btn btn--extralg btn--round btn--fullwhite txt-center" style="display: block; width:200px ; margin:0 auto" onclick="event.preventDefault();
                    document.getElementById('apply-form{{$application->id}}').submit();"> START NOW </a>
            <form id="apply-form{{$application->id}}" action="{{ route('application.apply') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
                <input type="hidden" name="app_name" value="{{$application->title}}">
                <input type="hidden" name="app_id" value="{{$application->id}}">
            </form>
        @endguest

    </section>

    <!--our work section -->


    <!--pricing section-->
    <!--icons section-->

    <!--testimonials section-->
    <!--drop us a line section-->
@endsection